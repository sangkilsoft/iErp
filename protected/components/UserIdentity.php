<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_unit = 'No Default Unit';
    private $_menu = array();

    public function authenticate() {
        $users = array(
            // username => password
            'demo' => 'demo',
            'admin' => 'admin',
        );
        if (!isset($users[$this->username]))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($users[$this->username] !== $this->password)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;

        /*
         * Set menu according to user role
         * make generator function from database model
         * set static for now, make dinamic later
         */
        $this->_menu = array(
            'items' => array(
                array('label' => 'Dashboard', 'url' => array('/site/index'), 'itemOptions' => array('class' => 'test')),
                array('label' => 'Admin Tools',
                    'items' => array(
                        array('label' => 'Organization', 'url' => array('/theme/index')),
                        array('label' => 'Users', 'url' => array('/theme/index')),
                        array('label' => 'User to Organization', 'url' => array('/theme/index')),
                        array('label' => 'Authentification & Roles', 'url' => array('/theme/index')),
                    ),
                    'visible' => true,
                ),
                array('label' => 'Data Master',
                    'items' => array(
                        array('label' => 'Categories', 'url' => array('/theme/create')),
                        array('label' => 'Supplier', 'url' => array('/theme/index')),
                        array('label' => 'Customer', 'url' => array('/theme/index')),
                        array('label' => 'Items Master', 'url' => array('/theme/index')),
                        array('label' => 'Items to Supplier', 'url' => array('/theme/index')),
                        array('label' => 'Items Pricing', 'url' => array('/theme/admin')),
                    ),
                ),
                array('label' => 'Purcahasing',
                    'items' => array(
                        array('label' => 'Items', 'url' => array('/theme/index')),
                        array('label' => 'Create Item', 'url' => array('/theme/create')),
                        array('label' => 'Manage Items', 'url' => array('/theme/admin')),
                    ),
                    'visible' => false,
                ),
                array('label' => 'Inventory',
                    'items' => array(
                        array('label' => 'Warehouse', 'url' => array('/Whse/index')),
                        array('label' => 'Locators', 'url' => array('/theme/create')),
                        array('label' => 'Good Receipt', 'url' => array('/theme/admin')),
                        array('label' => 'Good Issue', 'url' => array('/theme/admin')),
                        array('label' => 'Moves history', 'url' => array('/theme/admin')),
                        array('label' => 'Stock valuation', 'url' => array('/theme/admin')),
                        array('label' => 'Stock Opname', 'url' => array('/theme/admin')),
                        array('label' => 'Barcode Generator', 'url' => array('/theme/admin')),
                        
                    ),
                ),
                array('label' => 'Sales & Distribution',
                    'items' => array(
                        array('label' => 'Items', 'url' => array('/theme/index')),
                        array('label' => 'Create Item', 'url' => array('/theme/create')),
                        array('label' => 'Manage Items', 'url' => array('/theme/admin')),
                    ),
                    'visible' => false,
                ),
                array('label' => 'Finance & Costing',
                    'items' => array(
                        array('label' => 'Items', 'url' => array('/theme/index')),
                        array('label' => 'Create Item', 'url' => array('/theme/create')),
                        array('label' => 'Manage Items', 'url' => array('/theme/admin')),
                    ),
                    'visible' => false,
                ),
                array('label' => 'Theme Fiture',
                    'items' => array(
                        array('label' => 'Graphs & Charts', 'url' => array('/site/page', 'view' => 'graphs'), 'itemOptions' => array('class' => 'icon_chart')),
                        array('label' => 'Form Elements', 'url' => array('/site/page', 'view' => 'forms')),
                        array('label' => 'Interface Elements', 'url' => array('/site/page', 'view' => 'interface')),
                        array('label' => 'Error Pages', 'url' => array('/site/page', 'view' => 'Demo 404 page')),
                        array('label' => 'Calendar', 'url' => array('/site/page', 'view' => 'calendar')),
                        array('label' => 'Buttons & Icons', 'url' => array('/site/page', 'view' => 'buttons_and_icons')),
                    ),
                ),
                //array('label' => 'Contact', 'url' => array('/site/contact')),
                //array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                array('label' => 'Logout (' . $users[$this->username] . ')', 'url' => array('/site/logout')),
            ),
        );
        $this->setMMenu($this->_menu);
        return !$this->errorCode;
    }

    protected function setMMenu($val) {
        $this->setState('mmenu', $val);
    }

}