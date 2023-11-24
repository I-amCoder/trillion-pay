<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ReferralController;
use App\Http\Controllers\Admin\TimeManageController;
use App\Http\Controllers\Admin\ManageGatewayController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ManageSectionController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ManageWithdrawController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Gateway\coinpayments\ProcessController as CoinpaymentsProcessController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gateway\voguepay\ProcessController as VoguepayProcessController;
use App\Http\Controllers\PaymentController as ControllersPaymentController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\DynamicGatewayController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\Auth\ForgotPasswordController as AuthForgotPasswordController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\Gateway\flutterwave\ProcessController as FlutterwaveProcessController;
use App\Http\Controllers\Gateway\gourl\ProcessController as GourlProcessController;
use App\Http\Controllers\Gateway\mercadopago\ProcessController as MercadopagoProcessController;
use App\Http\Controllers\Gateway\mollie\ProcessController;
use App\Http\Controllers\Gateway\nowpayments\ProcessController as NowpaymentsProcessController;
use App\Http\Controllers\Gateway\paghiper\ProcessController as PaghiperProcessController;
use App\Http\Controllers\Gateway\paystack\ProcessController as PaystackProcessController;
use App\Http\Controllers\Gateway\paytm\ProcessController as PaytmProcessController;
use App\Http\Controllers\Gateway\perfectmoney\ProcessController as PerfectmoneyProcessController;
use App\Http\Controllers\Gateway\razorpay\ProcessController as RazorpayProcessController;
use App\Http\Controllers\Gateway\vouguepay\ProcessController as VouguepayProcessController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\LoginSecurityController;
use App\Http\Controllers\WalletController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::get('login', [LoginController::class, 'loginPage'])->name('login');

    Route::post('login', [LoginController::class, 'login']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
    Route::post('password/reset', [ForgotPasswordController::class, 'sendResetCodeEmail']);
    Route::post('password/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify.code');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('password/reset/change', [ResetPasswordController::class, 'reset'])->name('password.change');


    Route::middleware(['admin', 'demo'])->group(function () {

        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('home');

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('profile', [AdminController::class, 'profile'])->name('profile');

        Route::post('profile', [AdminController::class, 'profileUpdate'])->name('profile.update');

        Route::post('change/password', [AdminController::class, 'changePassword'])->name('change.password');

        Route::get('search/filter', [AdminController::class, 'tableFilter'])->name('table.filter');

        Route::get('login/message', [AdminController::class, 'loginMessage'])->name('login.message');
        Route::post('login/message', [AdminController::class, 'loginMessageUpdate'])->name('login.message.update');

        // Route::get('advertise', [AdvertiseController::class ,'advertisements'])->name('advertisements');
        // Route::post('advertise/store', [AdvertiseController::class ,'advertisementStore'])->name('advertisements.store');
        // Route::post('advertise/update/{id}', [AdvertiseController::class ,'advertisementUpdate'])->name('advertisements.update');
        // Route::post('advertise/remove/{id}', [AdvertiseController::class ,'advertisementRemove'])->name('advertisements.remove');


        // role Permission

        Route::resource('roles', RoleController::class, ['except' => ['show', 'delete', 'edit']])->middleware('permission:manage-role,admin');

        Route::resource('admins', AdminController::class)->middleware('permission:manage-admin,admin');

        Route::middleware('permission:manage-ticket,admin')->group(function () {
            Route::get('pendingList', [AdminTicketController::class, 'pendingList'])->name('ticket.pendingList');
            Route::post('ticket/reply', [AdminTicketController::class, 'reply'])->name('ticket.reply');
            Route::resource('ticket', AdminTicketController::class);
        });

        Route::middleware('permission:manage-plan,admin')->group(function () {
            Route::resource('plan', PlanController::class)->middleware('permission:manage-plan,admin');
            Route::post('plan/changestatus/{id}', [PlanController::class, 'planStatusChange'])->name('plan.changestatus');
        });

        Route::name('wallet.')->prefix('manage-wallets')->group(function (){
            Route::get('/', [WalletController::class,'index'])->name('index');
            Route::post('/update/{wallet_type}', [WalletController::class,'update'])->name('update');
        });


        Route::resource('time', TimeManageController::class)->middleware('permission:manage-schedule,admin');

        Route::middleware('permission:manage-referral,admin')->group(function () {
            Route::resource('referral', ReferralController::class);
            Route::post('invest/referral', [ReferralController::class, 'investStore'])->name('invest.store');
            Route::post('interest/referral', [ReferralController::class, 'interestStore'])->name('interest.store');
            Route::post('plan-interest/referral', [ReferralController::class, 'interestPlanStore'])->name('plan_interest.store');
            Route::post('/referral/status/{id}', [ReferralController::class, 'refferalStatusChange'])->name('refferalstatus');
        });

        Route::middleware('permission:manage-setting,admin')->group(function () {
            Route::get('general/setting', [GeneralSettingController::class, 'index'])->name('general.setting');
            Route::post('general/setting', [GeneralSettingController::class, 'generalSettingUpdate']);
            Route::get('general/preloader', [GeneralSettingController::class, 'preloader'])->name('general.preloader');
            Route::post('general/preloader', [GeneralSettingController::class, 'preloaderUpdate']);
            Route::get('general/analytics', [GeneralSettingController::class, 'analytics'])->name('general.analytics');
            Route::post('general/analytics', [GeneralSettingController::class, 'analyticsUpdate']);
            Route::get('general/cookie/consent', [GeneralSettingController::class, 'cookieConsent'])->name('general.cookie');
            Route::post('general/cookie/consent', [GeneralSettingController::class, 'cookieConsentUpdate']);
            Route::get('general/google/recaptcha', [GeneralSettingController::class, 'recaptcha'])->name('general.recaptcha');
            Route::post('general/google/recaptcha', [GeneralSettingController::class, 'recaptchaUpdate']);
            Route::get('general/live/chat', [GeneralSettingController::class, 'liveChat'])->name('general.live.chat');
            Route::post('general/live/chat', [GeneralSettingController::class, 'liveChatUpdate']);
            Route::get('cacheclear', [GeneralSettingController::class, 'cacheClear'])->name('general.cacheclear');
            Route::get('general/seo/manage', [GeneralSettingController::class, 'seoManage'])->name('general.seo');
            Route::post('general/seo/manage', [GeneralSettingController::class, 'seoManageUpdate']);
        });

        Route::middleware('permission:manage-gateway,admin')->group(function () {
            Route::get('gateway/bank', [ManageGatewayController::class, 'bank'])->name('payment.bank');
            Route::post('gateway/bank', [ManageGatewayController::class, 'bankUpdate']);
            Route::get('gateway/paypal', [ManageGatewayController::class, 'paypal'])->name('payment.paypal');
            Route::post('gateway/paypal', [ManageGatewayController::class, 'paypalUpdate']);
            Route::get('gateway/stripe', [ManageGatewayController::class, 'stripe'])->name('payment.stripe');
            Route::post('gateway/stripe', [ManageGatewayController::class, 'stripeUpdate']);
            Route::get('gateway/coin', [ManageGatewayController::class, 'coin'])->name('payment.coin');
            Route::post('gateway/coin', [ManageGatewayController::class, 'coinUpdate']);
            Route::get('gateway/razorpay', [ManageGatewayController::class, 'razorpay'])->name('payment.razorpay');
            Route::post('gateway/razorpay', [ManageGatewayController::class, 'razorpayUpdate']);
            Route::get('gateway/vougepay', [ManageGatewayController::class, 'vouguepay'])->name('payment.vougepay');
            Route::post('gateway/vougepay', [ManageGatewayController::class, 'vouguepayUpdate']);
            Route::get('gateway/mollie', [ManageGatewayController::class, 'mollie'])->name('payment.mollie');
            Route::post('gateway/mollie', [ManageGatewayController::class, 'mollieUpdate']);
            Route::get('gateway/nowpayments', [ManageGatewayController::class, 'nowPayments'])->name('payment.nowpay');
            Route::post('gateway/nowpayments', [ManageGatewayController::class, 'nowPaymentsUpdate']);
            Route::get('gateway/fullerwave', [ManageGatewayController::class, 'fullerwave'])->name('payment.fullerwave');
            Route::post('gateway/fullerwave', [ManageGatewayController::class, 'fullerwaveUpdate']);
            Route::get('gateway/paystack', [ManageGatewayController::class, 'paystack'])->name('payment.paystack');
            Route::post('gateway/paystack', [ManageGatewayController::class, 'paystackUpdate']);
            Route::get('gateway/paghiper', [ManageGatewayController::class, 'paghiper'])->name('payment.paghiper');
            Route::post('gateway/paghiper', [ManageGatewayController::class, 'paghiperUpdate']);
            Route::get('gateway/gourl', [ManageGatewayController::class, 'gourl'])->name('payment.gourl');
            Route::post('gateway/gourl', [ManageGatewayController::class, 'gourlUpdate']);
            Route::get('gateway/perfectmoney', [ManageGatewayController::class, 'perfectmoney'])->name('payment.perfectmoney');
            Route::post('gateway/perfectmoney', [ManageGatewayController::class, 'perfectmoneyUpdate']);
            Route::get('gateway/mercadopago', [ManageGatewayController::class, 'mercadopago'])->name('payment.mercadopago');
            Route::post('gateway/mercadopago', [ManageGatewayController::class, 'mercadopagoUpdate']);
            Route::get('gateway/paytm', [ManageGatewayController::class, 'paytm'])->name('payment.paytm');
            Route::post('gateway/paytm', [ManageGatewayController::class, 'paytmUpdate']);
            Route::resource('gateway', DynamicGatewayController::class);
        });

        Route::middleware('permission:manage-user,admin')->group(function () {
            Route::get('users', [ManageUserController::class, 'index'])->name('user');
            Route::get('users/details/{user}', [ManageUserController::class, 'userDetails'])->name('user.details');
            Route::post('users/update/{user}', [ManageUserController::class, 'userUpdate'])->name('user.update');
            Route::post('users/balance/{user}', [ManageUserController::class, 'userBalanceUpdate'])->name('user.balance.update');
            Route::post('users/mail/{user}', [ManageUserController::class, 'sendUserMail'])->name('user.mail');
            Route::delete('users/dlete/{user}', [ManageUserController::class, 'userDelete'])->name('user.delete');
            Route::get('users/search', [ManageUserController::class, 'index'])->name('user.search');
            Route::get('users/disabled', [ManageUserController::class, 'disabled'])->name('user.disabled');
            Route::get('user/{status}', [ManageUserController::class, 'userStatusWiseFilter'])->name('user.filter');
            Route::get('login/user/{id}', [ManageUserController::class, 'loginAsUser'])->name('login.user');
            Route::delete('users/interest/delete/{hash}', [ManageUserController::class, 'deleteInterest'])->name('user.interest.delete');

            Route::get('users/kyc', [ManageUserController::class, 'kyc'])->name('user.kyc');
            Route::post('users/kyc', [ManageUserController::class, 'kycUpdate']);

            Route::get('user/kyc/request', [ManageUserController::class, 'kycAll'])->name('user.kyc.req');
            Route::get('user/kyc/request/{id}', [ManageUserController::class, 'kycDetails'])->name('user.kyc.details');
            Route::post('user/kyc/{status}/{id}', [ManageUserController::class, 'kycStatus'])->name('user.kyc.status');
        });

        Route::middleware('permission:manage-withdraw,admin')->group(function () {
            Route::get('withdraw/method', [ManageWithdrawController::class, 'index'])->name('withdraw');
            Route::get('withdraw/method/search', [ManageWithdrawController::class, 'index'])->name('withdraw.search');
            Route::post('withdraw/method', [ManageWithdrawController::class, 'withdrawMethodCreate']);
            Route::post('withdraw/edit/{method}', [ManageWithdrawController::class, 'withdrawMethodUpdate'])->name('withdraw.update');
            Route::post('withdraw/delete/{method}', [ManageWithdrawController::class, 'withdrawMethodDelete'])->name('withdraw.delete');
            Route::get('withdraw/pending', [ManageWithdrawController::class, 'pending'])->name('withdraw.pending');
            Route::get('withdraw/accepted', [ManageWithdrawController::class, 'accepted'])->name('withdraw.accepted');
            Route::get('withdraw/rejected', [ManageWithdrawController::class, 'rejected'])->name('withdraw.rejected');
            Route::post('withdraw/accept/{withdraw}', [ManageWithdrawController::class, 'withdrawAccept'])->name('withdraw.accept');
            Route::post('withdraw/reject/{withdraw}', [ManageWithdrawController::class, 'withdrawReject'])->name('withdraw.reject');

            Route::post('withdraw/bulk/accept', [ManageWithdrawController::class, 'bulkWithdrawAccept'])->name('withdraw.bulk.accept');
            Route::post('withdraw/bulk/reject', [ManageWithdrawController::class, 'bulkWithdrawReject'])->name('withdraw.bulk.reject');


            Route::get('withdraw/sponser/commision/create', [ManageWithdrawController::class, 'createSponserCommision'])->name('sponser.commision.create');
            Route::post('withdraw/sponser/commision/update', [ManageWithdrawController::class, 'updateSponserCommision'])->name('sponser.commision.update');
            Route::get('admin/sponser/commision/delete/{id}', [ManageWithdrawController::class, 'deleteSponserCommision'])->name('sponser.commision.delete');
        });

        Route::middleware('permission:manage-frontend,admin')->group(function () {
            Route::get('pages', [PagesController::class, 'index'])->name('frontend.pages');
            Route::get('pages/create', [PagesController::class, 'pageCreate'])->name('frontend.pages.create');
            Route::post('pages/create', [PagesController::class, 'pageInsert']);
            Route::get('pages/edit/{page}', [PagesController::class, 'pageEdit'])->name('frontend.pages.edit');
            Route::post('pages/edit/{page}', [PagesController::class, 'pageUpdate']);
            Route::get('pages/search', [PagesController::class, 'index'])->name('frontend.search');
            Route::post('pages/delete/{page}', [PagesController::class, 'pageDelete'])->name('frontend.pages.delete');
            Route::get('manage/section', [ManageSectionController::class, 'index'])->name('frontend.section');
            Route::get('manage/section/{name}', [ManageSectionController::class, 'section'])->name('frontend.section.manage');
            Route::post('manage/section/{name}', [ManageSectionController::class, 'sectionContentUpdate']);
            Route::get('manage/element/{name}', [ManageSectionController::class, 'sectionElement'])->name('frontend.element');
            Route::get('manage/element/{name}/search', [ManageSectionController::class, 'section'])->name('frontend.element.search');
            Route::post('manage/element/{name}', [ManageSectionController::class, 'sectionElementCreate']);
            Route::get('edit/{name}/element/{element}', [ManageSectionController::class, 'editElement'])->name('frontend.element.edit');
            Route::post('edit/{name}/element/{element}', [ManageSectionController::class, 'updateElement']);
            Route::post('delete/{name}/element/{element}', [ManageSectionController::class, 'deleteElement'])->name('frontend.element.delete');
            Route::get('blog-category', [ManageSectionController::class, 'blogCategory'])->name('frontend.blog');
            Route::post('blog-category', [ManageSectionController::class, 'blogCategoryStore']);
            Route::post('blog-category/{blog}', [ManageSectionController::class, 'blogCategoryUpdate'])->name('frontend.blog.update');
            Route::post('blog-category/delete/{blog}', [ManageSectionController::class, 'blogCategoryDelete'])->name('frontend.blog.delete');
            Route::get('faq-category', [ManageSectionController::class, 'faqCategory'])->name('frontend.faq');
            Route::post('faq-category', [ManageSectionController::class, 'faqCategoryStore']);
            Route::post('faq-category/{faq}', [ManageSectionController::class, 'faqCategoryUpdate'])->name('frontend.faq.update');
            Route::post('faq-category/delete/{faq}', [ManageSectionController::class, 'faqCategoryDelete'])->name('frontend.faq.delete');
        });

        Route::middleware('permission:manage-language,admin')->group(function () {
            Route::get('language', [LanguageController::class, 'index'])->name('language.index');
            Route::post('language', [LanguageController::class, 'store']);
            Route::post('language/edit/{id}', [LanguageController::class, 'update'])->name('language.edit');
            Route::post('language/delete/{id}', [LanguageController::class, 'delete'])->name('language.delete');
            Route::get('language/translator/{lang}', [LanguageController::class, 'transalate'])->name('language.translator');
            Route::post('language/translator/{lang}', [LanguageController::class, 'transalateUpate']);
            Route::get('language/import', [LanguageController::class, 'import'])->name('language.import');
        });

        Route::middleware('permission:manage-theme,admin')->group(function () {
            Route::get('manage-theme', [GeneralSettingController::class, 'manageTheme'])->name('manage.theme');
            Route::post('manage-theme/{name}', [GeneralSettingController::class, 'themeUpdate'])->name('manage.theme.update');
        });

        Route::middleware('permission:manage-email,admin')->group(function () {
            Route::get('email/config', [EmailTemplateController::class, 'emailConfig'])->name('email.config');
            Route::post('email/config', [EmailTemplateController::class, 'emailConfigUpdate']);
            Route::get('email/templates', [EmailTemplateController::class, 'emailTemplates'])->name('email.templates');
            Route::get('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesEdit'])->name('email.templates.edit');
            Route::post('email/templates/{template}', [EmailTemplateController::class, 'emailTemplatesUpdate']);
        });

        Route::middleware('permission:manage-deposit,admin')->group(function () {
            Route::get('deposit/log/{user?}', [ManageGatewayController::class, 'depositLog'])->name('deposit.log');
            Route::get('deposit/payments/{trx}', [ManageGatewayController::class, 'depositDetails'])->name('deposit.trx');
            Route::post('deposit/payments/accept/{trx}', [ManageGatewayController::class, 'depositAccept'])->name('deposit.accept');
            Route::post('deposit/payments/reject/{trx}', [ManageGatewayController::class, 'depositReject'])->name('deposit.reject');
        });


        Route::middleware('permission:manage-logs,admin')->group(function () {
            Route::get('user/interest/log/{user?}', [ManageUserController::class, 'interestLog'])->name('user.interestlog');
            Route::get('commision/{user?}', [ReferralController::class, 'Commision'])->name('commision');
            Route::post('user/interest/log/{id}', [ManageUserController::class, 'deleteInterestLog'])->name('user.interestlog.delete');
            Route::post('commision/{id}', [ReferralController::class, 'deleteCommision'])->name('commision.delete');
        });


        Route::middleware('permission:manage-report,admin')->group(function () {
            Route::get('transaction-log/{user?}', [HomeController::class, 'transaction'])->name('transaction');
            Route::get('payment-report/{user?}', [ReportController::class, 'paymentReport'])->name('payment.report');
            Route::get('withdarw-report/{user?}', [ReportController::class, 'withdarawReport'])->name('withdraw.report');

            Route::get('money/transfer/log', [HomeController::class, 'MoneyTransfer'])->name('money.log');
        });

        Route::middleware('permission:Manual-payments,admin')->group(function () {
            Route::get('manual/payments', [ManageGatewayController::class, 'manualPayment'])->name('manual');
            Route::get('manual/payments/{trx}', [ManageGatewayController::class, 'manualPaymentDetails'])->name('manual.trx');
            Route::post('manual/payments/accept/{trx}', [ManageGatewayController::class, 'manualPaymentAccept'])->name('manual.accept');
            Route::post('manual/payments/reject/{trx}', [ManageGatewayController::class, 'manualPaymentReject'])->name('manual.reject');
            Route::get('{status}/payments', [ManageGatewayController::class, 'manualPayment'])->name('manual.status');
        });


        Route::get('subscribers', [HomeController::class, 'subscribers'])->name('subscribers')->middleware('permission:manage-subscriber,admin');

        Route::get('changeLang', [LanguageController::class, 'changeLang'])->name('changeLang');
        Route::get('/mark-as-read', [HomeController::class, 'markNotification'])->name('markNotification');
        Route::get('/deposit/mark-as-read', [HomeController::class, 'markDepositNotification'])->name('deposit.markNotification');

        Route::get('update/system', [HomeController::class, 'updateSystem'])->name('update.system');
    });
});


Route::name('user.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('register/{reffer?}', [RegisterController::class, 'index'])->name('register')->middleware('reg_off');
        Route::post('register/{reffer?}', [RegisterController::class, 'register'])->middleware('reg_off');

        Route::get('login', [AuthLoginController::class, 'index'])->name('login');
        Route::post('login', [AuthLoginController::class, 'login']);

        Route::get('forgot/password', [AuthForgotPasswordController::class, 'index'])->name('forgot.password');
        Route::post('forgot/password', [AuthForgotPasswordController::class, 'sendVerification']);
        Route::get('verify/code', [AuthForgotPasswordController::class, 'verify'])->name('auth.verify');
        Route::post('verify/code', [AuthForgotPasswordController::class, 'verifyCode']);
        Route::get('reset/password', [AuthForgotPasswordController::class, 'reset'])->name('reset.password');
        Route::post('reset/password', [AuthForgotPasswordController::class, 'resetPassword']);

        Route::get('verify/email', [AuthLoginController::class, 'emailVerify'])->name('email.verify');
        Route::post('verify/email', [AuthLoginController::class, 'emailVerifyConfirm'])->name('email.verify');
    });

    Route::middleware(['auth', 'inactive', 'is_email_verified'])->group(function () {


        Route::get('2fa', [LoginSecurityController::class, 'show2faForm'])->name('2fa');

        Route::post('2fa/generateSecret', [LoginSecurityController::class, 'generate2faSecret'])->name('generate2faSecret');
        Route::post('2fa/enable2fa', [LoginSecurityController::class, 'enable2fa'])->name('enable2fa');
        Route::post('2fa/disable2fa', [LoginSecurityController::class, 'disable2fa'])->name('disable2fa');
        Route::post('2fa/2faVerify', function () {
            return redirect(URL()->previous());
        })->name('2faVerify')->middleware('2fa');




        Route::get('authentication-verify', [AuthForgotPasswordController::class, 'verifyAuth'])->name('authentication.verify')->withoutMiddleware('is_email_verified');

        Route::post('authentication-verify/email', [AuthForgotPasswordController::class, 'verifyEmailAuth'])->name('authentication.verify.email')->withoutMiddleware('is_email_verified');

        Route::post('authentication-verify/sms', [AuthForgotPasswordController::class, 'verifySmsAuth'])->name('authentication.verify.sms')->withoutMiddleware('is_email_verified');

        Route::get('logout', [RegisterController::class, 'signOut'])->name('logout');
        Route::get('kyc', [UserController::class, 'kyc'])->name('kyc');
        Route::post('kyc', [UserController::class, 'kycUpdate']);


        Route::middleware('2fa', 'kyc')->group(function () {

            Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');


            Route::get('profile/setting', [UserController::class, 'profile'])->name('profile');
            Route::post('profile/setting', [UserController::class, 'profileUpdate'])->name('profileupdate');
            Route::get('profile/change/password', [UserController::class, 'changePassword'])->name('change.password');
            Route::post('profile/change/password', [UserController::class, 'updatePassword'])->name('update.password');

            Route::get('withdraw', [UserController::class, 'withdraw'])->name('withdraw');
            Route::get('withdraw/all', [UserController::class, 'allWithdraw'])->name('withdraw.all');
            Route::get('withdraw/pending', [UserController::class, 'pendingWithdraw'])->name('withdraw.pending');
            Route::get('withdraw/complete', [UserController::class, 'completeWithdraw'])->name('withdraw.complete');
            Route::post('withdraw', [UserController::class, 'withdrawCompleted']);
            Route::get('withdraw/fetch/{id}', [UserController::class, 'withdrawFetch'])->name('withdraw.fetch');
            Route::post('return/interest/{id}', [UserController::class, 'claimInterest'])->name('claiminterest');
            Route::get('return/interest', [UserController::class, 'returnInterest'])->name('returninterest');

            Route::resource('ticket', TicketController::class);
            Route::post('ticket/reply', [TicketController::class, 'reply'])->name('ticket.reply');
            Route::get('ticket/reply/status/change/{id}', [TicketController::class, 'statusChange'])->name('ticket.status-change');

            Route::get('ticket/status/{status}', [TicketController::class, 'ticketStatus'])->name('ticket.status');

            Route::get('ticket/attachement/{id}', [TicketController::class, 'ticketDownload'])->name('ticket.download');


            Route::get('commision', [UserController::class, 'Commision'])->name('commision');
            Route::get('team', [UserController::class, 'team'])->name('team');

            Route::get('investmentplan', [SiteController::class, 'investmentPlan'])->name('investmentplan');
            Route::post('investmentplan/invest', [SiteController::class, 'investmentUsingBalannce'])->name('investmentplan.submit');

            Route::get('gateways/{id}', [ControllersPaymentController::class, 'gateways'])->name('gateways');

            Route::post('paynow/{id}', [ControllersPaymentController::class, 'paynow'])->name('paynow');

            Route::get('gateways/{id}/details', [ControllersPaymentController::class, 'gatewaysDetails'])->name('gateway.details');


            Route::post('gateways/{id}/details', [ControllersPaymentController::class, 'gatewayRedirect']);

            Route::get('download-invoice', [ControllersPaymentController::class,'downloadInvoice']);



            Route::get('vouguepay/success', [VouguepayProcessController::class, 'returnSuccess'])->name('vouguepay.redirect');

            Route::get('coinpayments', [CoinpaymentsProcessController::class, 'ipn'])->name('coin.pay');

            Route::get('paypal', [PaypalPaymentController::class, 'ipn'])->name('paypal');

            Route::get('payment-success', [ProcessController::class, 'paymentSuccess'])->name('payment.success');

            Route::get('nowpay-success', [NowpaymentsProcessController::class, 'ipn'])->name('nowpay.success');

            Route::get('flutter-success', [FlutterwaveProcessController::class, 'returnSuccess'])->name('flutter.success');

            Route::get('paystack-success', [PaystackProcessController::class, 'returnSuccess'])->name('paystack.success');

            Route::post('razor/success', [RazorpayProcessController::class, 'returnSuccess'])->name('razor.success');
            Route::post('paghiper/success', [PaghiperProcessController::class, 'returnSuccess'])->name('paghiper.success');


            Route::post('perfectmoney/success', [PerfectmoneyProcessController::class, 'returnSuccess'])->name('perfectmoney.success');
            Route::post('mercadopago/success', [MercadopagoProcessController::class, 'returnSuccess'])->name('mercadopago.success');
            Route::post('paytm/success', [PaytmProcessController::class, 'returnSuccess'])->name('paytm.success');





            Route::match(['get', 'post'], '/payments/crypto/pay', Victorybiz\LaravelCryptoPaymentGateway\Http\Controllers\CryptoPaymentController::class)
                ->name('payments.crypto.pay');
            Route::post('/payments/crypto/callback', [GourlProcessController::class, 'callback'])->withoutMiddleware(['web', 'auth']);

            Route::get('transfer-money', [UserController::class, 'transfer'])->name('transfer_money');
            Route::post('transfer-money', [UserController::class, 'transferMoney']);






            // Route::get('invest/pending', [UserController::class, 'pendingInvest'])->name('invest.pending');
            Route::get('invest/all', [UserController::class, 'allInvest'])->name('invest.all');

            Route::get('interest/log', [UserController::class, 'interestLog'])->name('interest.log');

            Route::get('transaction/log', [UserController::class, 'transactionLog'])->name('transaction.log');

            Route::get('deposit', [DepositController::class, 'deposit'])->name('deposit');
            Route::get('deposit/log', [DepositController::class, 'depositLog'])->name('deposit.log');
            Route::get('invest/log', [SiteController::class, 'investLog'])->name('invest.log');

            Route::get('money/transfer/log', [SiteController::class, 'MoneyTransfer'])->name('money.log');

            // Wallet Transfers By Junaid
            Route::controller(WalletController::class)->prefix('wallet')->name('wallet.')->group(function(){
                Route::post('withdraw/{wallet}','withdrawAmount')->name('withdraw');
                Route::post('balance/','transferBalance')->name('profit_transfer');
                Route::get('balance/','transferLog')->name('transfer_log');
            });
        });
    });
});

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('changeLang', [SiteController::class, 'changeLang'])->name('user.changeLang');
Route::get('blogs', [SiteController::class, 'allblog'])->name('allblog');
Route::get('blog/{id}/{slug}', [SiteController::class, 'blog'])->name('blog');
Route::post('blog/comment/{id}', [SiteController::class, 'blogComment'])->name('blogcomment');
Route::get('investment/calculate/{id}', [DashboardController::class, 'investmentCalculate'])->name('user.investmentcalculate');
Route::post('subscribe', [DashboardController::class, 'subscribe'])->name('subscribe');
Route::post('contact', [SiteController::class, 'contactSend'])->name('contact');
Route::get('{pages}', [SiteController::class, 'page'])->name('pages');
Route::get('service/{slug}', [SiteController::class, 'service'])->name('service');

Route::get('investment/plan', [SiteController::class, 'allInvestmentPlan'])->name('investmentplan');
Route::get('    policy', [SiteController::class, 'privacyPolicy'])->name('privacy');


Route::get('return/interest', [InterestController::class, 'index'])->name('returninterest');
