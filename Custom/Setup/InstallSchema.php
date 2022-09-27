<?php 
namespace Like\Custom\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('custom_like_dislike');
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)
                            ->addColumn(
                                'id',
                                Table::TYPE_INTEGER,
                                null,
                                ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true]
                                )
                            ->addColumn(
                                'customeid',
                                Table::TYPE_INTEGER,
                                null,
                                ['nullable'=>false]
                                )
                            ->addColumn(
                                'product_id',
                                Table::TYPE_INTEGER,
                                null,
                                ['nullbale'=>false]
                                )
                            ->addColumn(
                                'like_dislike',
                                Table::TYPE_TEXT,
                                null,
                                ['nullbale'=>false]
                                )
                            ->setOption('charset','utf8');
            $conn->createTable($table);
        }
        $setup->endSetup();
    }
}
 ?>