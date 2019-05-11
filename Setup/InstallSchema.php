<?php
namespace Godogi\BannerSlider\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		if (!$setup->tableExists('godogi_bannerslider_banner')){
			$table = $setup->getConnection()->newTable($setup->getTable('godogi_bannerslider_banner'))
			->addColumn(
					'banner_id',
					Table::TYPE_INTEGER,
					null,
					['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
					'Banner Id'
			)->addColumn(
          'status',
          \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
          null,
          ['nullable' => false],
          'Status'
      )->addColumn(
					'url',
					Table::TYPE_TEXT,
					500,
					[],
					'URL'
			)->addColumn(
					'img',
					Table::TYPE_TEXT,
					500,
					[],
					'Image'
			)->addColumn(
					'created_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
					'Created At')
			->addColumn(
					'updated_at',
					Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
					'Updated At'
			)->setComment('Banners');
			$setup->getConnection()->createTable($table);
		}
		if (!$setup->tableExists('godogi_bannerslider_slider')){
			$table = $setup->getConnection()->newTable($setup->getTable('godogi_bannerslider_slider')
			)->addColumn(
				'slider_id',
				Table::TYPE_INTEGER,
				null,
				['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
				'Slider Id'
			)->addColumn(
				'title',
				Table::TYPE_TEXT,
				500,
				[],
				'Title'
			)->addColumn(
				'created_at',
				Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
				'Created At'
			)->addColumn(
				'updated_at',
				Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
				'Updated At'
			)->setComment(
				'Sliders'
			);
			$setup->getConnection()->createTable($table);
		}
		if (!$setup->tableExists('godogi_bannerslider_banner_slider')) {
			$table = $setup->getConnection()->newTable($setup->getTable('godogi_bannerslider_banner_slider'))
			->addColumn(
				'slider_id',
				Table::TYPE_INTEGER,
				null,
				['unsigned' => true,'nullable' => false,'primary' => true],
				'Slider ID')
			->addColumn(
				'banner_id',
				Table::TYPE_INTEGER,
				null,
				['unsigned' => true,'nullable' => false,'primary' => true],
				'Banner ID')
			->addColumn(
				'position',
				Table::TYPE_INTEGER,
				null,
				['nullable' => false,'default' => '0'],
				'Position')
			->addForeignKey(
				$setup->getFkName('godogi_bannerslider_banner_slider',
						'slider_id',
						'godogi_bannerslider_slider',
						'slider_id'),
				'slider_id',
				$setup->getTable('godogi_bannerslider_slider'),
				'slider_id',
				Table::ACTION_CASCADE)
			->addForeignKey(
				$setup->getFkName('godogi_bannerslider_banner_slider',
						'banner_id',
						'godogi_bannerslider_banner',
						'banner_id'),
				'banner_id',
				$setup->getTable('godogi_bannerslider_banner'),
				'banner_id',
				Table::ACTION_CASCADE)
			->setComment('Banner Slider Link');
			$setup->getConnection()->createTable($table);
		}
		$setup->endSetup();
	}
}
