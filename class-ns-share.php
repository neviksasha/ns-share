<?php

class NS_Share {

    public $id;
    public $echo;

    static $share = array(
        'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=%s',
        'twitter' => 'https://twitter.com/intent/tweet/?text=%s&url=%s',
        'telegram' => 'https://t.me/share/url?url=%s&text=%s',
        'linkedin' => 'https://www.linkedin.com/sharing/share-offsite/?url=%s',
    );

    public function __construct( $id = 0, $echo = true )
    {
        $this->id = get_the_ID() ?? $id;
        $this->echo  = $echo;
        $this->current_url = get_the_permalink( $this->id );
        $this->title = get_the_title( $this->id ) . ' - ' . get_bloginfo() ?? '';
    }

    public function facebook()
    {
        $link = sprintf( self::$share['facebook'], $this->current_url );
        $this->_return( $link );
    }

    public function twitter()
    {
        $link = sprintf( self::$share['twitter'], $this->title, $this->current_url );
        $this->_return( $link );
    }

    public function linkedin()
    {
        $link = sprintf( self::$share['linkedin'], $this->current_url );
        $this->_return( $link );
    }

    public function telegram()
    {
        $link = sprintf( self::$share['telegram'], $this->current_url, $this->title );
        $this->_return( $link );
    }


    protected function _return( $link )
    {
        if ( $this->echo === true )
            echo $link;

        return $link;
    }

}
