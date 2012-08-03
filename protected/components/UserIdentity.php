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
         */
        $this->_menu = array(
            'items' => array(
                array('label' => 'Dashboard', 'url' => array('/site/index'), 'itemOptions' => array('class' => 'test')),
                array('label' => 'Theme Pages',
                    'items' => array(
                        array('label' => 'Graphs & Charts', 'url' => array('/site/page', 'view' => 'graphs'), 'itemOptions' => array('class' => 'icon_chart')),
                        array('label' => 'Form Elements', 'url' => array('/site/page', 'view' => 'forms')),
                        array('label' => 'Interface Elements', 'url' => array('/site/page', 'view' => 'interface')),
                        array('label' => 'Error Pages', 'url' => array('/site/page', 'view' => 'Demo 404 page')),
                        array('label' => 'Calendar', 'url' => array('/site/page', 'view' => 'calendar')),
                        array('label' => 'Buttons & Icons', 'url' => array('/site/page', 'view' => 'buttons_and_icons')),
                    ),
                ),
                array('label' => 'Gii Generated Module',
                    'items' => array(
                        array('label' => 'Items', 'url' => array('/theme/index')),
                        array('label' => 'Create Item', 'url' => array('/theme/create')),
                        array('label' => 'Manage Items', 'url' => array('/theme/admin')),
                    ),
                ),
                array('label' => 'Contact', 'url' => array('/site/contact')),
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