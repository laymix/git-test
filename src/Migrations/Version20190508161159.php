<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190508161159 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sylius_invoicing_plugin_line_item ADD CONSTRAINT FK_C91408292989F1FD FOREIGN KEY (invoice_id) REFERENCES sylius_invoicing_plugin_invoice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_invoicing_plugin_tax_item ADD CONSTRAINT FK_2951C61C2989F1FD FOREIGN KEY (invoice_id) REFERENCES sylius_invoicing_plugin_invoice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_invoicing_plugin_invoice ADD CONSTRAINT FK_3AA279BF5CDB2AEB FOREIGN KEY (billing_data_id) REFERENCES sylius_invoicing_plugin_billing_data (id)');
        $this->addSql('ALTER TABLE brille24_tierprice ADD CONSTRAINT FK_BA5254F872F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id)');
        $this->addSql('ALTER TABLE brille24_tierprice ADD CONSTRAINT FK_BA5254F85708BDEF FOREIGN KEY (productVariant_id) REFERENCES sylius_product_variant (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token ADD CONSTRAINT FK_2AA4915D19EB6921 FOREIGN KEY (client_id) REFERENCES sylius_admin_api_client (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token ADD CONSTRAINT FK_2AA4915DA76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE sylius_product ADD CONSTRAINT FK_677B9B74731E505 FOREIGN KEY (main_taxon_id) REFERENCES sylius_taxon (id)');
        $this->addSql('ALTER TABLE sylius_product_channels ADD CONSTRAINT FK_F9EF269B4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_channels ADD CONSTRAINT FK_F9EF269B72F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_options ADD CONSTRAINT FK_2B5FF0094584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_options ADD CONSTRAINT FK_2B5FF009A7C41D6F FOREIGN KEY (option_id) REFERENCES sylius_product_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_review ADD CONSTRAINT FK_C7056A994584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_review ADD CONSTRAINT FK_C7056A99F675F31B FOREIGN KEY (author_id) REFERENCES sylius_customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_translation ADD CONSTRAINT FK_105A9082C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_option_value_translation ADD CONSTRAINT FK_8D4382DC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_option_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ProductReviewImage ADD CONSTRAINT FK_909B8EECDB5EB96C FOREIGN KEY (productreview_id) REFERENCES sylius_product_review (id)');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ADD CONSTRAINT FK_8A053E544584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_attribute_value ADD CONSTRAINT FK_8A053E54B6E62EFA FOREIGN KEY (attribute_id) REFERENCES sylius_product_attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_association ADD CONSTRAINT FK_48E9CDABB1E1C39 FOREIGN KEY (association_type_id) REFERENCES sylius_product_association_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_association ADD CONSTRAINT FK_48E9CDAB4584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_association_product ADD CONSTRAINT FK_A427B983EFB9C8A5 FOREIGN KEY (association_id) REFERENCES sylius_product_association (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_association_product ADD CONSTRAINT FK_A427B9834584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_option_value ADD CONSTRAINT FK_F7FF7D4BA7C41D6F FOREIGN KEY (option_id) REFERENCES sylius_product_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_option_translation ADD CONSTRAINT FK_CBA491AD2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_option (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_variant ADD CONSTRAINT FK_A29B5234584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_variant ADD CONSTRAINT FK_A29B5239DF894ED FOREIGN KEY (tax_category_id) REFERENCES sylius_tax_category (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_product_variant ADD CONSTRAINT FK_A29B5239E2D1A41 FOREIGN KEY (shipping_category_id) REFERENCES sylius_shipping_category (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value ADD CONSTRAINT FK_76CDAFA13B69A9AF FOREIGN KEY (variant_id) REFERENCES sylius_product_variant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value ADD CONSTRAINT FK_76CDAFA1D957CA06 FOREIGN KEY (option_value_id) REFERENCES sylius_product_option_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_attribute_translation ADD CONSTRAINT FK_93850EBA2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_attribute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_association_type_translation ADD CONSTRAINT FK_4F618E52C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_association_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_image ADD CONSTRAINT FK_88C64B2D7E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants ADD CONSTRAINT FK_8FFDAE8D3DA5256D FOREIGN KEY (image_id) REFERENCES sylius_product_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants ADD CONSTRAINT FK_8FFDAE8D3B69A9AF FOREIGN KEY (variant_id) REFERENCES sylius_product_variant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_variant_translation ADD CONSTRAINT FK_8DC18EDC2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_product_variant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_taxon ADD CONSTRAINT FK_169C6CD94584665A FOREIGN KEY (product_id) REFERENCES sylius_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_product_taxon ADD CONSTRAINT FK_169C6CD9DE13F470 FOREIGN KEY (taxon_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_shipment ADD CONSTRAINT FK_FD707B3319883967 FOREIGN KEY (method_id) REFERENCES sylius_shipping_method (id)');
        $this->addSql('ALTER TABLE sylius_shipment ADD CONSTRAINT FK_FD707B338D9F6D38 FOREIGN KEY (order_id) REFERENCES sylius_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_shipment ADD CONSTRAINT FK_FD707B339395C3F3 FOREIGN KEY (customer_id) REFERENCES sylius_customer (id)');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation ADD CONSTRAINT FK_2B37DB3D2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_shipping_method (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD CONSTRAINT FK_5FB0EE1112469DE2 FOREIGN KEY (category_id) REFERENCES sylius_shipping_category (id)');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD CONSTRAINT FK_5FB0EE119F2C3FAB FOREIGN KEY (zone_id) REFERENCES sylius_zone (id)');
        $this->addSql('ALTER TABLE sylius_shipping_method ADD CONSTRAINT FK_5FB0EE119DF894ED FOREIGN KEY (tax_category_id) REFERENCES sylius_tax_category (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels ADD CONSTRAINT FK_2D9833355F7D6850 FOREIGN KEY (shipping_method_id) REFERENCES sylius_shipping_method (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels ADD CONSTRAINT FK_2D98333572F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_customer ADD CONSTRAINT FK_7E82D5E6D2919A68 FOREIGN KEY (customer_group_id) REFERENCES sylius_customer_group (id)');
        $this->addSql('ALTER TABLE sylius_customer ADD CONSTRAINT FK_7E82D5E6BD94FB16 FOREIGN KEY (default_address_id) REFERENCES sylius_address (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_address ADD CONSTRAINT FK_B97FF0589395C3F3 FOREIGN KEY (customer_id) REFERENCES sylius_customer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_zone_member ADD CONSTRAINT FK_E8B5ABF34B0E929B FOREIGN KEY (belongs_to) REFERENCES sylius_zone (id)');
        $this->addSql('ALTER TABLE sylius_province ADD CONSTRAINT FK_B5618FE4F92F3E70 FOREIGN KEY (country_id) REFERENCES sylius_country (id)');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT FK_ACA6E0F28D9F6D38 FOREIGN KEY (order_id) REFERENCES sylius_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT FK_ACA6E0F2E415FB15 FOREIGN KEY (order_item_id) REFERENCES sylius_order_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_adjustment ADD CONSTRAINT FK_ACA6E0F2F720C233 FOREIGN KEY (order_item_unit_id) REFERENCES sylius_order_item_unit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_order_item ADD CONSTRAINT FK_77B587ED8D9F6D38 FOREIGN KEY (order_id) REFERENCES sylius_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_order_item ADD CONSTRAINT FK_77B587ED3B69A9AF FOREIGN KEY (variant_id) REFERENCES sylius_product_variant (id)');
        $this->addSql('ALTER TABLE sylius_order ADD CONSTRAINT FK_6196A1F972F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id)');
        $this->addSql('ALTER TABLE sylius_order ADD CONSTRAINT FK_6196A1F917B24436 FOREIGN KEY (promotion_coupon_id) REFERENCES sylius_promotion_coupon (id)');
        $this->addSql('ALTER TABLE sylius_order ADD CONSTRAINT FK_6196A1F99395C3F3 FOREIGN KEY (customer_id) REFERENCES sylius_customer (id)');
        $this->addSql('ALTER TABLE sylius_order ADD CONSTRAINT FK_6196A1F94D4CFF2B FOREIGN KEY (shipping_address_id) REFERENCES sylius_address (id)');
        $this->addSql('ALTER TABLE sylius_order ADD CONSTRAINT FK_6196A1F979D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES sylius_address (id)');
        $this->addSql('ALTER TABLE sylius_promotion_order ADD CONSTRAINT FK_BF9CF6FB8D9F6D38 FOREIGN KEY (order_id) REFERENCES sylius_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_promotion_order ADD CONSTRAINT FK_BF9CF6FB139DF194 FOREIGN KEY (promotion_id) REFERENCES sylius_promotion (id)');
        $this->addSql('ALTER TABLE sylius_order_item_unit ADD CONSTRAINT FK_82BF226EE415FB15 FOREIGN KEY (order_item_id) REFERENCES sylius_order_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_order_item_unit ADD CONSTRAINT FK_82BF226E7BE036FC FOREIGN KEY (shipment_id) REFERENCES sylius_shipment (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT FK_16C8119E743BF776 FOREIGN KEY (default_locale_id) REFERENCES sylius_locale (id)');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT FK_16C8119E3101778E FOREIGN KEY (base_currency_id) REFERENCES sylius_currency (id)');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT FK_16C8119EA978C17 FOREIGN KEY (default_tax_zone_id) REFERENCES sylius_zone (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT FK_16C8119EB5282EDF FOREIGN KEY (shop_billing_data_id) REFERENCES sylius_shop_billing_data (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_channel_currencies ADD CONSTRAINT FK_AE491F9372F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_channel_currencies ADD CONSTRAINT FK_AE491F9338248176 FOREIGN KEY (currency_id) REFERENCES sylius_currency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_channel_locales ADD CONSTRAINT FK_786B7A8472F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_channel_locales ADD CONSTRAINT FK_786B7A84E559DFD1 FOREIGN KEY (locale_id) REFERENCES sylius_locale (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_channel_pricing ADD CONSTRAINT FK_7801820CA80EF684 FOREIGN KEY (product_variant_id) REFERENCES sylius_product_variant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token ADD CONSTRAINT FK_9160E3FA19EB6921 FOREIGN KEY (client_id) REFERENCES sylius_admin_api_client (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token ADD CONSTRAINT FK_9160E3FAA76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code ADD CONSTRAINT FK_E366D84819EB6921 FOREIGN KEY (client_id) REFERENCES sylius_admin_api_client (id)');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code ADD CONSTRAINT FK_E366D848A76ED395 FOREIGN KEY (user_id) REFERENCES sylius_admin_user (id)');
        $this->addSql('ALTER TABLE Seller ADD CONSTRAINT FK_FCB6D6CA6614251F FOREIGN KEY (defaultAddress_id) REFERENCES sylius_address (id)');
        $this->addSql('ALTER TABLE sylius_taxon_image ADD CONSTRAINT FK_DBE52B287E3C61F9 FOREIGN KEY (owner_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT FK_CFD811CAA977936C FOREIGN KEY (tree_root) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_taxon ADD CONSTRAINT FK_CFD811CA727ACA70 FOREIGN KEY (parent_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_taxon_translation ADD CONSTRAINT FK_1487DFCF2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_taxon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_tax_rate ADD CONSTRAINT FK_3CD86B2E12469DE2 FOREIGN KEY (category_id) REFERENCES sylius_tax_category (id)');
        $this->addSql('ALTER TABLE sylius_tax_rate ADD CONSTRAINT FK_3CD86B2E9F2C3FAB FOREIGN KEY (zone_id) REFERENCES sylius_zone (id)');
        $this->addSql('ALTER TABLE sylius_exchange_rate ADD CONSTRAINT FK_5F52B852A76BEED FOREIGN KEY (source_currency) REFERENCES sylius_currency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_exchange_rate ADD CONSTRAINT FK_5F52B85B3FD5856 FOREIGN KEY (target_currency) REFERENCES sylius_currency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_payment_method_translation ADD CONSTRAINT FK_966BE3A12C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES sylius_payment_method (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_payment_method ADD CONSTRAINT FK_A75B0B0DF23D6140 FOREIGN KEY (gateway_config_id) REFERENCES sylius_gateway_config (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE sylius_payment_method_channels ADD CONSTRAINT FK_543AC0CC5AA1164F FOREIGN KEY (payment_method_id) REFERENCES sylius_payment_method (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_payment_method_channels ADD CONSTRAINT FK_543AC0CC72F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_payment ADD CONSTRAINT FK_D9191BD419883967 FOREIGN KEY (method_id) REFERENCES sylius_payment_method (id)');
        $this->addSql('ALTER TABLE sylius_payment ADD CONSTRAINT FK_D9191BD48D9F6D38 FOREIGN KEY (order_id) REFERENCES sylius_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_promotion_coupon ADD CONSTRAINT FK_B04EBA85139DF194 FOREIGN KEY (promotion_id) REFERENCES sylius_promotion (id)');
        $this->addSql('ALTER TABLE sylius_promotion_action ADD CONSTRAINT FK_933D0915139DF194 FOREIGN KEY (promotion_id) REFERENCES sylius_promotion (id)');
        $this->addSql('ALTER TABLE sylius_promotion_rule ADD CONSTRAINT FK_2C188EA8139DF194 FOREIGN KEY (promotion_id) REFERENCES sylius_promotion (id)');
        $this->addSql('ALTER TABLE sylius_promotion_channels ADD CONSTRAINT FK_1A044F64139DF194 FOREIGN KEY (promotion_id) REFERENCES sylius_promotion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_promotion_channels ADD CONSTRAINT FK_1A044F6472F5A1AA FOREIGN KEY (channel_id) REFERENCES sylius_channel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sylius_shop_user ADD CONSTRAINT FK_7C2B74809395C3F3 FOREIGN KEY (customer_id) REFERENCES sylius_customer (id)');
        $this->addSql('ALTER TABLE sylius_user_oauth ADD CONSTRAINT FK_C3471B78A76ED395 FOREIGN KEY (user_id) REFERENCES sylius_shop_user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ProductReviewImage DROP FOREIGN KEY FK_909B8EECDB5EB96C');
        $this->addSql('ALTER TABLE Seller DROP FOREIGN KEY FK_FCB6D6CA6614251F');
        $this->addSql('ALTER TABLE brille24_tierprice DROP FOREIGN KEY FK_BA5254F872F5A1AA');
        $this->addSql('ALTER TABLE brille24_tierprice DROP FOREIGN KEY FK_BA5254F85708BDEF');
        $this->addSql('ALTER TABLE sylius_address DROP FOREIGN KEY FK_B97FF0589395C3F3');
        $this->addSql('ALTER TABLE sylius_adjustment DROP FOREIGN KEY FK_ACA6E0F28D9F6D38');
        $this->addSql('ALTER TABLE sylius_adjustment DROP FOREIGN KEY FK_ACA6E0F2E415FB15');
        $this->addSql('ALTER TABLE sylius_adjustment DROP FOREIGN KEY FK_ACA6E0F2F720C233');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token DROP FOREIGN KEY FK_2AA4915D19EB6921');
        $this->addSql('ALTER TABLE sylius_admin_api_access_token DROP FOREIGN KEY FK_2AA4915DA76ED395');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code DROP FOREIGN KEY FK_E366D84819EB6921');
        $this->addSql('ALTER TABLE sylius_admin_api_auth_code DROP FOREIGN KEY FK_E366D848A76ED395');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token DROP FOREIGN KEY FK_9160E3FA19EB6921');
        $this->addSql('ALTER TABLE sylius_admin_api_refresh_token DROP FOREIGN KEY FK_9160E3FAA76ED395');
        $this->addSql('ALTER TABLE sylius_channel DROP FOREIGN KEY FK_16C8119E743BF776');
        $this->addSql('ALTER TABLE sylius_channel DROP FOREIGN KEY FK_16C8119E3101778E');
        $this->addSql('ALTER TABLE sylius_channel DROP FOREIGN KEY FK_16C8119EA978C17');
        $this->addSql('ALTER TABLE sylius_channel DROP FOREIGN KEY FK_16C8119EB5282EDF');
        $this->addSql('ALTER TABLE sylius_channel_currencies DROP FOREIGN KEY FK_AE491F9372F5A1AA');
        $this->addSql('ALTER TABLE sylius_channel_currencies DROP FOREIGN KEY FK_AE491F9338248176');
        $this->addSql('ALTER TABLE sylius_channel_locales DROP FOREIGN KEY FK_786B7A8472F5A1AA');
        $this->addSql('ALTER TABLE sylius_channel_locales DROP FOREIGN KEY FK_786B7A84E559DFD1');
        $this->addSql('ALTER TABLE sylius_channel_pricing DROP FOREIGN KEY FK_7801820CA80EF684');
        $this->addSql('ALTER TABLE sylius_customer DROP FOREIGN KEY FK_7E82D5E6D2919A68');
        $this->addSql('ALTER TABLE sylius_customer DROP FOREIGN KEY FK_7E82D5E6BD94FB16');
        $this->addSql('ALTER TABLE sylius_exchange_rate DROP FOREIGN KEY FK_5F52B852A76BEED');
        $this->addSql('ALTER TABLE sylius_exchange_rate DROP FOREIGN KEY FK_5F52B85B3FD5856');
        $this->addSql('ALTER TABLE sylius_invoicing_plugin_invoice DROP FOREIGN KEY FK_3AA279BF5CDB2AEB');
        $this->addSql('ALTER TABLE sylius_invoicing_plugin_line_item DROP FOREIGN KEY FK_C91408292989F1FD');
        $this->addSql('ALTER TABLE sylius_invoicing_plugin_tax_item DROP FOREIGN KEY FK_2951C61C2989F1FD');
        $this->addSql('ALTER TABLE sylius_order DROP FOREIGN KEY FK_6196A1F972F5A1AA');
        $this->addSql('ALTER TABLE sylius_order DROP FOREIGN KEY FK_6196A1F917B24436');
        $this->addSql('ALTER TABLE sylius_order DROP FOREIGN KEY FK_6196A1F99395C3F3');
        $this->addSql('ALTER TABLE sylius_order DROP FOREIGN KEY FK_6196A1F94D4CFF2B');
        $this->addSql('ALTER TABLE sylius_order DROP FOREIGN KEY FK_6196A1F979D0C0E4');
        $this->addSql('ALTER TABLE sylius_order_item DROP FOREIGN KEY FK_77B587ED8D9F6D38');
        $this->addSql('ALTER TABLE sylius_order_item DROP FOREIGN KEY FK_77B587ED3B69A9AF');
        $this->addSql('ALTER TABLE sylius_order_item_unit DROP FOREIGN KEY FK_82BF226EE415FB15');
        $this->addSql('ALTER TABLE sylius_order_item_unit DROP FOREIGN KEY FK_82BF226E7BE036FC');
        $this->addSql('ALTER TABLE sylius_payment DROP FOREIGN KEY FK_D9191BD419883967');
        $this->addSql('ALTER TABLE sylius_payment DROP FOREIGN KEY FK_D9191BD48D9F6D38');
        $this->addSql('ALTER TABLE sylius_payment_method DROP FOREIGN KEY FK_A75B0B0DF23D6140');
        $this->addSql('ALTER TABLE sylius_payment_method_channels DROP FOREIGN KEY FK_543AC0CC5AA1164F');
        $this->addSql('ALTER TABLE sylius_payment_method_channels DROP FOREIGN KEY FK_543AC0CC72F5A1AA');
        $this->addSql('ALTER TABLE sylius_payment_method_translation DROP FOREIGN KEY FK_966BE3A12C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product DROP FOREIGN KEY FK_677B9B74731E505');
        $this->addSql('ALTER TABLE sylius_product_association DROP FOREIGN KEY FK_48E9CDABB1E1C39');
        $this->addSql('ALTER TABLE sylius_product_association DROP FOREIGN KEY FK_48E9CDAB4584665A');
        $this->addSql('ALTER TABLE sylius_product_association_product DROP FOREIGN KEY FK_A427B983EFB9C8A5');
        $this->addSql('ALTER TABLE sylius_product_association_product DROP FOREIGN KEY FK_A427B9834584665A');
        $this->addSql('ALTER TABLE sylius_product_association_type_translation DROP FOREIGN KEY FK_4F618E52C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product_attribute_translation DROP FOREIGN KEY FK_93850EBA2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product_attribute_value DROP FOREIGN KEY FK_8A053E544584665A');
        $this->addSql('ALTER TABLE sylius_product_attribute_value DROP FOREIGN KEY FK_8A053E54B6E62EFA');
        $this->addSql('ALTER TABLE sylius_product_channels DROP FOREIGN KEY FK_F9EF269B4584665A');
        $this->addSql('ALTER TABLE sylius_product_channels DROP FOREIGN KEY FK_F9EF269B72F5A1AA');
        $this->addSql('ALTER TABLE sylius_product_image DROP FOREIGN KEY FK_88C64B2D7E3C61F9');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants DROP FOREIGN KEY FK_8FFDAE8D3DA5256D');
        $this->addSql('ALTER TABLE sylius_product_image_product_variants DROP FOREIGN KEY FK_8FFDAE8D3B69A9AF');
        $this->addSql('ALTER TABLE sylius_product_option_translation DROP FOREIGN KEY FK_CBA491AD2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product_option_value DROP FOREIGN KEY FK_F7FF7D4BA7C41D6F');
        $this->addSql('ALTER TABLE sylius_product_option_value_translation DROP FOREIGN KEY FK_8D4382DC2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product_options DROP FOREIGN KEY FK_2B5FF0094584665A');
        $this->addSql('ALTER TABLE sylius_product_options DROP FOREIGN KEY FK_2B5FF009A7C41D6F');
        $this->addSql('ALTER TABLE sylius_product_review DROP FOREIGN KEY FK_C7056A994584665A');
        $this->addSql('ALTER TABLE sylius_product_review DROP FOREIGN KEY FK_C7056A99F675F31B');
        $this->addSql('ALTER TABLE sylius_product_taxon DROP FOREIGN KEY FK_169C6CD94584665A');
        $this->addSql('ALTER TABLE sylius_product_taxon DROP FOREIGN KEY FK_169C6CD9DE13F470');
        $this->addSql('ALTER TABLE sylius_product_translation DROP FOREIGN KEY FK_105A9082C2AC5D3');
        $this->addSql('ALTER TABLE sylius_product_variant DROP FOREIGN KEY FK_A29B5234584665A');
        $this->addSql('ALTER TABLE sylius_product_variant DROP FOREIGN KEY FK_A29B5239DF894ED');
        $this->addSql('ALTER TABLE sylius_product_variant DROP FOREIGN KEY FK_A29B5239E2D1A41');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value DROP FOREIGN KEY FK_76CDAFA13B69A9AF');
        $this->addSql('ALTER TABLE sylius_product_variant_option_value DROP FOREIGN KEY FK_76CDAFA1D957CA06');
        $this->addSql('ALTER TABLE sylius_product_variant_translation DROP FOREIGN KEY FK_8DC18EDC2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_promotion_action DROP FOREIGN KEY FK_933D0915139DF194');
        $this->addSql('ALTER TABLE sylius_promotion_channels DROP FOREIGN KEY FK_1A044F64139DF194');
        $this->addSql('ALTER TABLE sylius_promotion_channels DROP FOREIGN KEY FK_1A044F6472F5A1AA');
        $this->addSql('ALTER TABLE sylius_promotion_coupon DROP FOREIGN KEY FK_B04EBA85139DF194');
        $this->addSql('ALTER TABLE sylius_promotion_order DROP FOREIGN KEY FK_BF9CF6FB8D9F6D38');
        $this->addSql('ALTER TABLE sylius_promotion_order DROP FOREIGN KEY FK_BF9CF6FB139DF194');
        $this->addSql('ALTER TABLE sylius_promotion_rule DROP FOREIGN KEY FK_2C188EA8139DF194');
        $this->addSql('ALTER TABLE sylius_province DROP FOREIGN KEY FK_B5618FE4F92F3E70');
        $this->addSql('ALTER TABLE sylius_shipment DROP FOREIGN KEY FK_FD707B3319883967');
        $this->addSql('ALTER TABLE sylius_shipment DROP FOREIGN KEY FK_FD707B338D9F6D38');
        $this->addSql('ALTER TABLE sylius_shipment DROP FOREIGN KEY FK_FD707B339395C3F3');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP FOREIGN KEY FK_5FB0EE1112469DE2');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP FOREIGN KEY FK_5FB0EE119F2C3FAB');
        $this->addSql('ALTER TABLE sylius_shipping_method DROP FOREIGN KEY FK_5FB0EE119DF894ED');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels DROP FOREIGN KEY FK_2D9833355F7D6850');
        $this->addSql('ALTER TABLE sylius_shipping_method_channels DROP FOREIGN KEY FK_2D98333572F5A1AA');
        $this->addSql('ALTER TABLE sylius_shipping_method_translation DROP FOREIGN KEY FK_2B37DB3D2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_shop_user DROP FOREIGN KEY FK_7C2B74809395C3F3');
        $this->addSql('ALTER TABLE sylius_tax_rate DROP FOREIGN KEY FK_3CD86B2E12469DE2');
        $this->addSql('ALTER TABLE sylius_tax_rate DROP FOREIGN KEY FK_3CD86B2E9F2C3FAB');
        $this->addSql('ALTER TABLE sylius_taxon DROP FOREIGN KEY FK_CFD811CAA977936C');
        $this->addSql('ALTER TABLE sylius_taxon DROP FOREIGN KEY FK_CFD811CA727ACA70');
        $this->addSql('ALTER TABLE sylius_taxon_image DROP FOREIGN KEY FK_DBE52B287E3C61F9');
        $this->addSql('ALTER TABLE sylius_taxon_translation DROP FOREIGN KEY FK_1487DFCF2C2AC5D3');
        $this->addSql('ALTER TABLE sylius_user_oauth DROP FOREIGN KEY FK_C3471B78A76ED395');
        $this->addSql('ALTER TABLE sylius_zone_member DROP FOREIGN KEY FK_E8B5ABF34B0E929B');
    }
}
