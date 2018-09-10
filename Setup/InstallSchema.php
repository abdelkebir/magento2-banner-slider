<?php
namespace Godogi\BannerSlider\Setup;
 
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable(
            $setup->getTable('godogi_bannerslider_banner')
        )->addColumn(
            'banner_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Banner Id'
        )->addColumn(
            'url',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            500,
            [],
            'URL'
        )->addColumn(
            'img',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            500,
            [],
            'Image'
        )->addColumn(
	        'created_at',
	        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
	        null,
	        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
	        'Created At'
	     )->addColumn(
            'order',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Order'
        )->setComment(
            'Banners'
        );
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
	}
}