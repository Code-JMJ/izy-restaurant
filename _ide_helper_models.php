<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @property string $symbol
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereSymbol($value)
 */
	class Currency extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocumentType whereUpdatedAt($value)
 */
	class DocumentType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $code
 * @property string $department
 * @property string $province
 * @property string $district
 * @method static \Illuminate\Database\Eloquent\Builder|Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Location query()
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Location whereProvince($value)
 */
	class Location extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $document_type_code
 * @property string $document_number
 * @property string $business_name
 * @property string $trade_name
 * @property string $email
 * @property string|null $profile_logo
 * @property string|null $invoice_logo
 * @property string|null $tax_address
 * @property string|null $location_code
 * @property string $environment_type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\DocumentType|null $document_type
 * @property-read \App\Models\PartnerSetting|null $settings
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereBusinessName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereDocumentNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereDocumentTypeCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereEnvironmentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereInvoiceLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereLocationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereProfileLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereTaxAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereTradeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 */
	class Partner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $partner_id
 * @property string $name
 * @property string|null $address
 * @property string|null $website
 * @property string $sales_tax
 * @property string $print_invoice
 * @property string $print_cash_closure
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch wherePrintCashClosure($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch wherePrintInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereSalesTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerBranch whereWebsite($value)
 */
	class PartnerBranch extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $partner_id
 * @property string $currency_code
 * @property int $number_of_decimals number od decimals
 * @property int $expiration_notification_days Notify when the lot expires in X days
 * @property int $restrict_stock 0:false, 1:true
 * @property int $round_cash_transactions number of decimals to round cash transactions
 * @property int $electronic_invoicing 1: Yes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereCurrencyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereElectronicInvoicing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereExpirationNotificationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereNumberOfDecimals($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereRestrictStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereRoundCashTransactions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PartnerSetting whereUpdatedAt($value)
 */
	class PartnerSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $description_key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereDescriptionKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionGroup whereUpdatedAt($value)
 */
	class PermissionGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property int|null $partner_branch_id
 * @property int|null $partner_id
 * @property string|null $profile_photo_path
 * @property int $partner_main_user 1:si 0:no
 * @property string $locale
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Partner|null $partner
 * @property-read \App\Models\PartnerBranch|null $partner_branch
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePartnerBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePartnerMainUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

