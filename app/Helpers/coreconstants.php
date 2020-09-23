<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 7/1/18
 * Time: 1:04 PM
 */

/*
 * Common Constant
 */
const LANGUAGE_DEFAULT = 'en';
const LANGUAGE_IDN = 'id';
const TIMEZONE_DEFAULT = '+GMT';
const ITEM_PER_PAGE = 10;
const ORDER_PER_PAGE = 50;
const TRADE_HISTORY_PER_PAGE = 50;
const ORDER_LIMIT = 8;


/*
 * Constant user and role IDs
 */

const USER_ROLE_SUPER_ADMIN = 1;
const USER_ROLE_USER = 2;
const USER_ROLE_TRADE_ANALYST = 3;

const FIXED_USER_SUPER_ADMIN = 1;

/*
 * Response from services
 * used only for return
 */

const SERVICE_RESPONSE_STATUS = 'status';
const SERVICE_RESPONSE_MESSAGE = 'message';

const SERVICE_RESPONSE_SUCCESS = 'success';
const SERVICE_RESPONSE_WARNING = 'warning';
const SERVICE_RESPONSE_ERROR = 'error';

/*
 * Images
 */
const PROFILE_IMAGE = 'avatar.jpg';

/*
 * Route Configuration file
 */

const ROUTE_SECTION_USER_MANAGEMENTS = 'user_managements';
const ROUTE_SECTION_APPLICATION_MANAGEMENTS = 'application_managements';
const ROUTE_SECTION_TRADE_ANALYST = 'trade_analyst';
const ROUTE_SECTION_TRADER = 'trader';

const ROUTE_SUB_SECTION_USERS = 'users';
const ROUTE_SUB_SECTION_ROLE_MANAGEMENTS = 'role_managements';
const ROUTE_SUB_SECTION_ADMIN_SETTINGS = 'admin_settings';

const ROUTE_GROUP_READER_ACCESS = 'reader_access';
const ROUTE_GROUP_CREATION_ACCESS = 'creation_access';
const ROUTE_GROUP_MODIFIER_ACCESS = 'modifier_access';
const ROUTE_GROUP_DELETION_ACCESS = 'deletion_access';
const ROUTE_GROUP_FULL_ACCESS = 'full_access';

const ROUTE_TYPE_AVOIDABLE_MAINTENANCE = 'avoidable_maintenance_routes';
const ROUTE_TYPE_AVOIDABLE_UNVERIFIED = 'avoidable_unverified_routes';
const ROUTE_TYPE_AVOIDABLE_SUSPENDED = 'avoidable_suspended_routes';
const ROUTE_TYPE_FINANCIAL = 'financial_routes';
const ROUTE_TYPE_PRIVATE = 'private_routes';

/*
 * All route redirection
 */

const ROUTE_REDIRECT_TO_UNAUTHORIZED = 'unauthorized';
const ROUTE_REDIRECT_TO_UNDER_MAINTENANCE = 'under_maintenance';
const ROUTE_REDIRECT_TO_EMAIL_UNVERIFIED = 'email_unverified';
const ROUTE_REDIRECT_TO_ACCOUNT_SUSPENDED = 'account_suspended';
const ROUTE_REDIRECT_TO_FINANCIAL_ACCOUNT_SUSPENDED = 'financial_account_suspended';
const REDIRECT_ROUTE_TO_USER_AFTER_LOGIN = 'profile.index';
const REDIRECT_ROUTE_TO_LOGIN = 'login';

/*
 * All Status
 */
const UNDER_MAINTENANCE_MODE_ACTIVE = 1;
const UNDER_MAINTENANCE_MODE_INACTIVE = 0;

const UNDER_MAINTENANCE_ACCESS_ACTIVE = 1;
const UNDER_MAINTENANCE_ACCESS_INACTIVE = 0;

const ACTIVE_STATUS_ACTIVE = 1;
const ACTIVE_STATUS_INACTIVE = 0;

const FINANCIAL_STATUS_ACTIVE = 1;
const FINANCIAL_STATUS_INACTIVE = 0;

const EMAIL_VERIFICATION_STATUS_ACTIVE = 1;
const EMAIL_VERIFICATION_STATUS_INACTIVE = 0;

const ACCOUNT_STATUS_ACTIVE = 1;
const ACCOUNT_STATUS_INACTIVE = 0;
const ACCOUNT_STATUS_DELETED = -1;
// currencies
const CURRENCY_REAL = 1;
const CURRENCY_CRYPTO = 2;
const CURRENCY_VIRTUAL = 3;
const CURRENCY_COMPANY_SHARE = 4;

// APIs
const API_PAYPAL = 1;
const API_COINPAYMENT = 2;
const API_BITCOIN = 3;
const BANK_TRANSFER = 4;
const API_EDC = 5;
// id status
const ID_STATUS_UNVERIFIED = 0;
const ID_STATUS_PENDING = 1;
const ID_STATUS_VERIFIED = 2;
// id type
const ID_PASSPORT = 1;
const ID_NID = 2;
const ID_DRIVER_LICENSE = 3;
// exchange type
const EXCHANGE_BUY = 1;
const EXCHANGE_SELL = 2;
// category type
const CATEGORY_EXCHANGE = 1;
const CATEGORY_MARGIN = 2;
const CATEGORY_LENDING = 3;
const CATEGORY_ICO = 4;
//
const MINIMUM_TRANSACTION_FEE_CRYPTO = '0.00000001';
const MINIMUM_TRANSACTION_FEE_CURRENCY = '0.01';

//transaction type
const TRANSACTION_TYPE_DEBIT = 1;
const TRANSACTION_TYPE_CREDIT = 2;
const TRANSACTION_TYPE_TRANSFER = 3;

//journal type
const DECREASED_FROM_WALLET_ON_ORDER_PLACE = 1;
const INCREASED_TO_ORDER_ON_ORDER_PLACE = 2;

const DECREASED_FROM_ORDER_ON_ORDER_CANCELLATION = 3;
const INCREASED_TO_WALLET_ON_ORDER_CANCELLATION = 4;

const DECREASED_FROM_ORDER_ON_SETTLEMENT = 5;
const INCREASED_TO_WALLET_ON_SETTLEMENT = 6;


const DECREASED_FROM_ORDER_ON_SUCCESSFUL_TRANSACTION = 7;
const INCREASED_TO_EXCHANGE_ON_SUCCESSFUL_TRANSACTION = 8;
const DECREASED_FROM_EXCHANGE_ON_SUCCESSFUL_TRANSACTION = 9;
const INCREASED_TO_WALLET_ON_SUCCESSFUL_TRANSACTION = 10;
const DECREASED_FROM_EXCHANGE_AS_SERVICE_FEE_ON_SUCCESSFUL_TRANSACTION = 11;
const INCREASED_TO_SYSTEM_AS_SERVICE_FEE_ON_SUCCESSFUL_TRANSACTION = 12;


const DECREASED_FROM_WALLET_ON_WITHDRAWAL_REQUEST = 13;
const INCREASED_TO_WITHDRAWAL_ON_WITHDRAWAL_REQUEST = 14;

const DECREASED_FROM_WITHDRAWAL_ON_WITHDRAWAL_CONFIRMATION = 15;
const INCREASED_TO_OUTSIDE_ON_WITHDRAWAL_CONFIRMATION = 16;

const DECREASED_FROM_WITHDRAWAL_AS_WITHDRAWAL_FEE_ON_WITHDRAWAL_CONFIRMATION = 17;
const INCREASED_TO_SYSTEM_ON_AS_WITHDRAWAL_FEE_WITHDRAWAL_CONFIRMATION = 18;

const DECREASED_FROM_WITHDRAWAL_ON_WITHDRAWAL_CANCELLATION = 19;
const INCREASED_TO_WALLET_ON_WITHDRAWAL_CANCELLATION = 20;


const DECREASED_FROM_OUTSIDE_ON_DEPOSIT_REQUEST = 21;
const INCREASED_TO_DEPOSIT_ON_DEPOSIT_REQUEST = 22;

const DECREASED_FROM_DEPOSIT_ON_DEPOSIT_CONFIRMATION = 23;
const INCREASED_TO_WALLET_ON_DEPOSIT_CONFIRMATION = 24;

const DECREASED_FROM_DEPOSIT_AS_DEPOSIT_FEE_ON_DEPOSIT_CONFIRMATION = 25;
const INCREASED_TO_SYSTEM_AS_DEPOSIT_FEE_DEPOSIT_CONFIRMATION = 26;

const DECREASED_FROM_DEPOSIT_ON_DEPOSIT_CANCELLATION = 27;
const INCREASED_TO_OUTSIDE_ON_DEPOSIT_CANCELLATION = 28;
const INCREASED_TO_SYSTEM_ON_SUCCESSFUL_TRANSACTION = 29;

const INCREASED_TO_WALLET_FROM_SYSTEM_ON_ICO_PURCHASE = 30;
const DECREASED_FROM_SYSTEM_ON_ICO_SALE = 31;

const DECREASED_FROM_EXCHANGE_REFERRAL_EARNING_ON_SUCCESSFUL_TRANSACTION = 32;
const INCREASED_TO_WALLET_AS_REFERRAL_EARNING_ON_SUCCESSFUL_TRANSACTION = 33;

const DECREASED_FROM_SYSTEM_ON_TRANSFER_BY_ADMIN = 34;
const INCREASED_TO_USER_WALLET_ON_TRANSFER_BY_ADMIN = 35;

const DECREASED_FROM_USER_WALLET_ON_TRANSFER_BY_ADMIN = 36;
const INCREASED_TO_SYSTEM_ON_TRANSFER_BY_ADMIN = 37;

const REPLACED_USER_WALLET_ON_TRANSFER_BY_ADMIN = 38;
const REPLACED_BY_SYSTEM_ON_TRANSFER_BY_ADMIN = 39;

//Stock order status
const STOCK_ORDER_INACTIVE = 0;
const STOCK_ORDER_PENDING = 1;
const STOCK_ORDER_COMPLETED = 2;
const STOCK_ORDER_CANCELED = 3;

// payment status
const PAYMENT_FAILED = -1;
const PAYMENT_REVIEWING = 0;
const PAYMENT_PENDING = 1;
const PAYMENT_DECLINED = 2;
const PAYMENT_COMPLETED = 3;

// operation type
const OPERATION_INCREASE = 1;
const OPERATION_DECREASE = 2;
const OPERATION_REPLACE = 3;