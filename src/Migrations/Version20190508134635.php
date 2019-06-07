<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190508134635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Lau (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ProductReviewImage (id INT AUTO_INCREMENT NOT NULL, productreview_id INT DEFAULT NULL, type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, path VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_909B8EECDB5EB96C (productreview_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Seller (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, username_canonical VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, encoder_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, last_login DATETIME DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, password_requested_at DATETIME DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, verified_at DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, credentials_expire_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', email VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, email_canonical VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, firstName VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, lastName VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, birthday DATETIME DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, phoneNumber VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, defaultAddress_id INT NOT NULL, UNIQUE INDEX UNIQ_FCB6D6CA6614251F (defaultAddress_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE brille24_tierprice (id INT AUTO_INCREMENT NOT NULL, channel_id INT DEFAULT NULL, price INT NOT NULL, priceuro INT NOT NULL, qty INT NOT NULL, productVariant_id INT DEFAULT NULL, INDEX IDX_BA5254F85708BDEF (productVariant_id), INDEX IDX_BA5254F872F5A1AA (channel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_address (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, last_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, phone_number VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, street VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, company VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, city VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, postcode VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, country_code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, province_code VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, province_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_B97FF0589395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_address_log_entries (id INT AUTO_INCREMENT NOT NULL, action VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, logged_at DATETIME NOT NULL, object_id VARCHAR(64) DEFAULT NULL COLLATE utf8_unicode_ci, object_class VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, version INT NOT NULL, data LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', username VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_adjustment (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, order_item_id INT DEFAULT NULL, order_item_unit_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, label VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, amount INT NOT NULL, is_neutral TINYINT(1) NOT NULL, is_locked TINYINT(1) NOT NULL, origin_code VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_ACA6E0F2E415FB15 (order_item_id), INDEX IDX_ACA6E0F28D9F6D38 (order_id), INDEX IDX_ACA6E0F2F720C233 (order_item_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_admin_api_access_token (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_2AA4915D19EB6921 (client_id), UNIQUE INDEX UNIQ_2AA4915D5F37A13B (token), INDEX IDX_2AA4915DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_admin_api_auth_code (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, redirect_uri LONGTEXT NOT NULL COLLATE utf8_unicode_ci, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_E366D84819EB6921 (client_id), UNIQUE INDEX UNIQ_E366D8485F37A13B (token), INDEX IDX_E366D848A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_admin_api_client (id INT AUTO_INCREMENT NOT NULL, random_id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, redirect_uris LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', secret VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, allowed_grant_types LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_admin_api_refresh_token (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, user_id INT DEFAULT NULL, token VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, expires_at INT DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_9160E3FA19EB6921 (client_id), UNIQUE INDEX UNIQ_9160E3FA5F37A13B (token), INDEX IDX_9160E3FAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_admin_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, username_canonical VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, encoder_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, last_login DATETIME DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, password_requested_at DATETIME DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, verified_at DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, credentials_expire_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', email VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, email_canonical VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, last_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, locale_code VARCHAR(12) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_channel (id INT AUTO_INCREMENT NOT NULL, default_locale_id INT NOT NULL, base_currency_id INT NOT NULL, default_tax_zone_id INT DEFAULT NULL, shop_billing_data_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, color VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, hostname VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, theme_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, tax_calculation_strategy VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, contact_email VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, skipping_shipping_step_allowed TINYINT(1) NOT NULL, skipping_payment_step_allowed TINYINT(1) NOT NULL, account_verification_required TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_16C8119EB5282EDF (shop_billing_data_id), INDEX IDX_16C8119E3101778E (base_currency_id), INDEX IDX_16C8119EE551C011 (hostname), UNIQUE INDEX UNIQ_16C8119E77153098 (code), INDEX IDX_16C8119E743BF776 (default_locale_id), INDEX IDX_16C8119EA978C17 (default_tax_zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_channel_currencies (channel_id INT NOT NULL, currency_id INT NOT NULL, INDEX IDX_AE491F9372F5A1AA (channel_id), INDEX IDX_AE491F9338248176 (currency_id), PRIMARY KEY(channel_id, currency_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_channel_locales (channel_id INT NOT NULL, locale_id INT NOT NULL, INDEX IDX_786B7A8472F5A1AA (channel_id), INDEX IDX_786B7A84E559DFD1 (locale_id), PRIMARY KEY(channel_id, locale_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_channel_pricing (id INT AUTO_INCREMENT NOT NULL, product_variant_id INT NOT NULL, price INT NOT NULL, original_price INT DEFAULT NULL, channel_code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX product_variant_channel_idx (product_variant_id, channel_code), INDEX IDX_7801820CA80EF684 (product_variant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_country (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(2) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, INDEX IDX_E74256BF77153098 (code), UNIQUE INDEX UNIQ_E74256BF77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_currency (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(3) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_96EDD3D077153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_customer (id INT AUTO_INCREMENT NOT NULL, customer_group_id INT DEFAULT NULL, default_address_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, email_canonical VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, first_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, last_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, birthday DATETIME DEFAULT NULL, gender VARCHAR(1) DEFAULT \'u\' NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, subscribed_to_newsletter TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_7E82D5E6A0D96FBF (email_canonical), INDEX IDX_7E82D5E6D2919A68 (customer_group_id), UNIQUE INDEX UNIQ_7E82D5E6E7927C74 (email), UNIQUE INDEX UNIQ_7E82D5E6BD94FB16 (default_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_customer_group (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_7FCF9B0577153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_exchange_rate (id INT AUTO_INCREMENT NOT NULL, source_currency INT NOT NULL, target_currency INT NOT NULL, ratio NUMERIC(10, 5) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_5F52B85B3FD5856 (target_currency), UNIQUE INDEX UNIQ_5F52B852A76BEEDB3FD5856 (source_currency, target_currency), INDEX IDX_5F52B852A76BEED (source_currency), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_gateway_config (id INT AUTO_INCREMENT NOT NULL, gateway_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, factory_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, config JSON NOT NULL COMMENT \'(DC2Type:json_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_invoicing_plugin_billing_data (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, last_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, company VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, street VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, city VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, postcode VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, country_code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, province_code VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, province_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_invoicing_plugin_invoice (id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, billing_data_id INT DEFAULT NULL, number VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, order_number VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, issued_at DATETIME NOT NULL, currency_code VARCHAR(3) NOT NULL COLLATE utf8_unicode_ci, locale_code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, total INT NOT NULL, channel_code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, channel_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, shopBillingData_company VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, shopBillingData_tax_id VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, shopBillingData_street VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, shopBillingData_city VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, shopBillingData_postcode VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, shopBillingData_country_code VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_3AA279BF551F0F81 (order_number), UNIQUE INDEX UNIQ_3AA279BF5CDB2AEB (billing_data_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_invoicing_plugin_line_item (id INT AUTO_INCREMENT NOT NULL, invoice_id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, quantity INT NOT NULL, unit_price INT NOT NULL, subtotal INT NOT NULL, tax_total INT NOT NULL, total INT NOT NULL, variant_code VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, variant_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_C91408292989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_invoicing_plugin_sequence (id INT AUTO_INCREMENT NOT NULL, idx INT NOT NULL, version INT DEFAULT 1 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_invoicing_plugin_tax_item (id INT AUTO_INCREMENT NOT NULL, invoice_id VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, label VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, amount INT NOT NULL, INDEX IDX_2951C61C2989F1FD (invoice_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_locale (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(12) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_7BA1286477153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_order (id INT AUTO_INCREMENT NOT NULL, channel_id INT DEFAULT NULL, promotion_coupon_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, shipping_address_id INT DEFAULT NULL, billing_address_id INT DEFAULT NULL, number VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, notes LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, state VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, checkout_completed_at DATETIME DEFAULT NULL, items_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, currency_code VARCHAR(3) NOT NULL COLLATE utf8_unicode_ci, locale_code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, checkout_state VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, payment_state VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, shipping_state VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, token_value VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, customer_ip VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_6196A1F94D4CFF2B (shipping_address_id), INDEX IDX_6196A1F972F5A1AA (channel_id), INDEX IDX_6196A1F99395C3F3 (customer_id), UNIQUE INDEX UNIQ_6196A1F996901F54 (number), UNIQUE INDEX UNIQ_6196A1F979D0C0E4 (billing_address_id), INDEX IDX_6196A1F917B24436 (promotion_coupon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_order_item (id INT AUTO_INCREMENT NOT NULL, order_id INT NOT NULL, variant_id INT NOT NULL, quantity INT NOT NULL, unit_price INT NOT NULL, units_total INT NOT NULL, adjustments_total INT NOT NULL, total INT NOT NULL, is_immutable TINYINT(1) NOT NULL, product_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, variant_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, INDEX IDX_77B587ED3B69A9AF (variant_id), INDEX IDX_77B587ED8D9F6D38 (order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_order_item_unit (id INT AUTO_INCREMENT NOT NULL, order_item_id INT NOT NULL, shipment_id INT DEFAULT NULL, adjustments_total INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_82BF226E7BE036FC (shipment_id), INDEX IDX_82BF226EE415FB15 (order_item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_order_sequence (id INT AUTO_INCREMENT NOT NULL, idx INT NOT NULL, version INT DEFAULT 1 NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_payment (id INT AUTO_INCREMENT NOT NULL, method_id INT DEFAULT NULL, order_id INT NOT NULL, currency_code VARCHAR(3) NOT NULL COLLATE utf8_unicode_ci, amount INT NOT NULL, state VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, details JSON NOT NULL COMMENT \'(DC2Type:json_array)\', created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D9191BD48D9F6D38 (order_id), INDEX IDX_D9191BD419883967 (method_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_payment_method (id INT AUTO_INCREMENT NOT NULL, gateway_config_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, environment VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, is_enabled TINYINT(1) NOT NULL, position INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_A75B0B0DF23D6140 (gateway_config_id), UNIQUE INDEX UNIQ_A75B0B0D77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_payment_method_channels (payment_method_id INT NOT NULL, channel_id INT NOT NULL, INDEX IDX_543AC0CC5AA1164F (payment_method_id), INDEX IDX_543AC0CC72F5A1AA (channel_id), PRIMARY KEY(payment_method_id, channel_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_payment_method_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, instructions LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX sylius_payment_method_translation_uniq_trans (translatable_id, locale), INDEX IDX_966BE3A12C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_payment_security_token (hash VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, details LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:object)\', after_url LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, target_url LONGTEXT NOT NULL COLLATE utf8_unicode_ci, gateway_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(hash)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product (id INT AUTO_INCREMENT NOT NULL, main_taxon_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, enabled TINYINT(1) NOT NULL, variant_selection_method VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, average_rating DOUBLE PRECISION DEFAULT \'0\' NOT NULL, INDEX IDX_677B9B74731E505 (main_taxon_id), UNIQUE INDEX UNIQ_677B9B7477153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_association (id INT AUTO_INCREMENT NOT NULL, association_type_id INT NOT NULL, product_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_48E9CDAB4584665A (product_id), UNIQUE INDEX product_association_idx (product_id, association_type_id), INDEX IDX_48E9CDABB1E1C39 (association_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_association_product (association_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_A427B983EFB9C8A5 (association_id), INDEX IDX_A427B9834584665A (product_id), PRIMARY KEY(association_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_association_type (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_CCB8914C77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_association_type_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX sylius_product_association_type_translation_uniq_trans (translatable_id, locale), INDEX IDX_4F618E52C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_attribute (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, storage_type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, configuration LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, position INT NOT NULL, UNIQUE INDEX UNIQ_BFAF484A77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_attribute_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX sylius_product_attribute_translation_uniq_trans (translatable_id, locale), INDEX IDX_93850EBA2C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_attribute_value (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, attribute_id INT NOT NULL, locale_code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, text_value LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, boolean_value TINYINT(1) DEFAULT NULL, integer_value INT DEFAULT NULL, float_value DOUBLE PRECISION DEFAULT NULL, datetime_value DATETIME DEFAULT NULL, date_value DATE DEFAULT NULL, json_value JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', INDEX IDX_8A053E54B6E62EFA (attribute_id), INDEX IDX_8A053E544584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_channels (product_id INT NOT NULL, channel_id INT NOT NULL, INDEX IDX_F9EF269B4584665A (product_id), INDEX IDX_F9EF269B72F5A1AA (channel_id), PRIMARY KEY(product_id, channel_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, path VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_88C64B2D7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_image_product_variants (image_id INT NOT NULL, variant_id INT NOT NULL, INDEX IDX_8FFDAE8D3DA5256D (image_id), INDEX IDX_8FFDAE8D3B69A9AF (variant_id), PRIMARY KEY(image_id, variant_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_option (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, position INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_E4C0EBEF77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_option_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX sylius_product_option_translation_uniq_trans (translatable_id, locale), INDEX IDX_CBA491AD2C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_option_value (id INT AUTO_INCREMENT NOT NULL, option_id INT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_F7FF7D4BA7C41D6F (option_id), UNIQUE INDEX UNIQ_F7FF7D4B77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_option_value_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, value VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX sylius_product_option_value_translation_uniq_trans (translatable_id, locale), INDEX IDX_8D4382DC2C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_options (product_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_2B5FF0094584665A (product_id), INDEX IDX_2B5FF009A7C41D6F (option_id), PRIMARY KEY(product_id, option_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_review (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, rating INT NOT NULL, comment LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, status VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_C7056A99F675F31B (author_id), INDEX IDX_C7056A994584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_taxon (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, taxon_id INT NOT NULL, position INT NOT NULL, INDEX IDX_169C6CD9DE13F470 (taxon_id), UNIQUE INDEX product_taxon_idx (product_id, taxon_id), INDEX IDX_169C6CD94584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, meta_keywords VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, meta_description VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, short_description LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_105A9084180C698989D9B62 (locale, slug), UNIQUE INDEX sylius_product_translation_uniq_trans (translatable_id, locale), INDEX IDX_105A9082C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_variant (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, tax_category_id INT DEFAULT NULL, shipping_category_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, position INT NOT NULL, version INT DEFAULT 1 NOT NULL, on_hold INT NOT NULL, on_hand INT NOT NULL, tracked TINYINT(1) NOT NULL, width DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, depth DOUBLE PRECISION DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, shipping_required TINYINT(1) NOT NULL, INDEX IDX_A29B5234584665A (product_id), INDEX IDX_A29B5239E2D1A41 (shipping_category_id), UNIQUE INDEX UNIQ_A29B52377153098 (code), INDEX IDX_A29B5239DF894ED (tax_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_variant_option_value (variant_id INT NOT NULL, option_value_id INT NOT NULL, INDEX IDX_76CDAFA13B69A9AF (variant_id), INDEX IDX_76CDAFA1D957CA06 (option_value_id), PRIMARY KEY(variant_id, option_value_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_product_variant_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX sylius_product_variant_translation_uniq_trans (translatable_id, locale), INDEX IDX_8DC18EDC2C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_promotion (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, priority INT NOT NULL, exclusive TINYINT(1) NOT NULL, usage_limit INT DEFAULT NULL, used INT NOT NULL, coupon_based TINYINT(1) NOT NULL, starts_at DATETIME DEFAULT NULL, ends_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_F157396377153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_promotion_action (id INT AUTO_INCREMENT NOT NULL, promotion_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, configuration LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', INDEX IDX_933D0915139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_promotion_channels (promotion_id INT NOT NULL, channel_id INT NOT NULL, INDEX IDX_1A044F64139DF194 (promotion_id), INDEX IDX_1A044F6472F5A1AA (channel_id), PRIMARY KEY(promotion_id, channel_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_promotion_coupon (id INT AUTO_INCREMENT NOT NULL, promotion_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, usage_limit INT DEFAULT NULL, used INT NOT NULL, expires_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, per_customer_usage_limit INT DEFAULT NULL, INDEX IDX_B04EBA85139DF194 (promotion_id), UNIQUE INDEX UNIQ_B04EBA8577153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_promotion_order (order_id INT NOT NULL, promotion_id INT NOT NULL, INDEX IDX_BF9CF6FB8D9F6D38 (order_id), INDEX IDX_BF9CF6FB139DF194 (promotion_id), PRIMARY KEY(order_id, promotion_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_promotion_rule (id INT AUTO_INCREMENT NOT NULL, promotion_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, configuration LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', INDEX IDX_2C188EA8139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_province (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, abbreviation VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_B5618FE4F92F3E705E237E06 (country_id, name), INDEX IDX_B5618FE4F92F3E70 (country_id), UNIQUE INDEX UNIQ_B5618FE477153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_shipment (id INT AUTO_INCREMENT NOT NULL, method_id INT NOT NULL, order_id INT NOT NULL, customer_id INT DEFAULT NULL, state VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, tracking VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_FD707B338D9F6D38 (order_id), INDEX IDX_FD707B3319883967 (method_id), INDEX IDX_FD707B339395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_shipping_category (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_B1D6465277153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_shipping_method (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, zone_id INT NOT NULL, tax_category_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, configuration LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', category_requirement INT NOT NULL, calculator VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, is_enabled TINYINT(1) NOT NULL, position INT NOT NULL, archived_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_5FB0EE1112469DE2 (category_id), INDEX IDX_5FB0EE119DF894ED (tax_category_id), UNIQUE INDEX UNIQ_5FB0EE1177153098 (code), INDEX IDX_5FB0EE119F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_shipping_method_channels (shipping_method_id INT NOT NULL, channel_id INT NOT NULL, INDEX IDX_2D9833355F7D6850 (shipping_method_id), INDEX IDX_2D98333572F5A1AA (channel_id), PRIMARY KEY(shipping_method_id, channel_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_shipping_method_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX sylius_shipping_method_translation_uniq_trans (translatable_id, locale), INDEX IDX_2B37DB3D2C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_shop_billing_data (id INT AUTO_INCREMENT NOT NULL, company VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, tax_id VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, country_code VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, street VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, city VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, postcode VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_shop_user (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, username VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, username_canonical VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, encoder_name VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, last_login DATETIME DEFAULT NULL, password_reset_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, password_requested_at DATETIME DEFAULT NULL, email_verification_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, verified_at DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, credentials_expire_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', email VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, email_canonical VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_7C2B74809395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_tax_category (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_221EB0BE77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_tax_rate (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, zone_id INT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, amount NUMERIC(10, 5) NOT NULL, included_in_price TINYINT(1) NOT NULL, calculator VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_3CD86B2E12469DE2 (category_id), UNIQUE INDEX UNIQ_3CD86B2E77153098 (code), INDEX IDX_3CD86B2E9F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_taxon (id INT AUTO_INCREMENT NOT NULL, tree_root INT DEFAULT NULL, parent_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, tree_left INT NOT NULL, tree_right INT NOT NULL, tree_level INT NOT NULL, position INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_CFD811CAA977936C (tree_root), UNIQUE INDEX UNIQ_CFD811CA77153098 (code), INDEX IDX_CFD811CA727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_taxon_image (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, type VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, path VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_DBE52B287E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_taxon_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, description LONGTEXT DEFAULT NULL COLLATE utf8_unicode_ci, locale VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX slug_uidx (locale, slug), UNIQUE INDEX sylius_taxon_translation_uniq_trans (translatable_id, locale), INDEX IDX_1487DFCF2C2AC5D3 (translatable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_user_oauth (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, provider VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, identifier VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, access_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, refresh_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX user_provider (user_id, provider), INDEX IDX_C3471B78A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_zone (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, type VARCHAR(8) NOT NULL COLLATE utf8_unicode_ci, scope VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_7BE2258E77153098 (code), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sylius_zone_member (id INT AUTO_INCREMENT NOT NULL, belongs_to INT DEFAULT NULL, code VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_E8B5ABF34B0E929B77153098 (belongs_to, code), INDEX IDX_E8B5ABF34B0E929B (belongs_to), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Lau');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE ProductReviewImage');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Seller');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE brille24_tierprice');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_address');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_address_log_entries');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_adjustment');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_admin_api_access_token');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_admin_api_auth_code');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_admin_api_client');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_admin_api_refresh_token');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_admin_user');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_channel');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_channel_currencies');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_channel_locales');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_channel_pricing');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_country');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_currency');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_customer');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_customer_group');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_exchange_rate');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_gateway_config');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_invoicing_plugin_billing_data');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_invoicing_plugin_invoice');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_invoicing_plugin_line_item');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_invoicing_plugin_sequence');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_invoicing_plugin_tax_item');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_locale');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_order');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_order_item');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_order_item_unit');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_order_sequence');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_payment');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_payment_method');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_payment_method_channels');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_payment_method_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_payment_security_token');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_association');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_association_product');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_association_type');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_association_type_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_attribute');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_attribute_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_attribute_value');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_channels');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_image');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_image_product_variants');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_option');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_option_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_option_value');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_option_value_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_options');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_review');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_taxon');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_variant');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_variant_option_value');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_product_variant_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_promotion');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_promotion_action');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_promotion_channels');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_promotion_coupon');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_promotion_order');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_promotion_rule');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_province');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_shipment');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_shipping_category');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_shipping_method');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_shipping_method_channels');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_shipping_method_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_shop_billing_data');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_shop_user');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_tax_category');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_tax_rate');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_taxon');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_taxon_image');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_taxon_translation');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_user_oauth');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_zone');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE sylius_zone_member');
    }
}
