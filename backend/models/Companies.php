<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $company_name
 * @property string $company_email
 * @property string $company_address
 * @property string $logo
 * @property string $company_start_date
 * @property string $company_created_date
 * @property string $company_status
 *
 * @property Branches[] $branches
 * @property Departments[] $departments
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'company_email', 'company_address','company_created_date', 'company_start_date',  'company_status'], 'required'],
            [['company_start_date', 'company_created_date'], 'safe'],
            [['company_status'], 'string'],
            [['file'], 'file'],
            [['company_name', 'logo', 'company_email'], 'string', 'max' => 100],
            [['company_address'], 'string', 'max' => 255],
            [['logo'], 'string', 'max' => 200],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'logo' => 'Logo',
            'company_created_date' => 'Company Created Date',
            'company_start_date' => 'Company Start Date',
            'company_status' => 'Company Status',
            'file' => 'Logo'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranches()
    {
        return $this->hasMany(Branches::className(), ['companies_company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['companies_company_id' => 'company_id']);
    }
}
