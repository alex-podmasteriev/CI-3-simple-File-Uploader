<?php
class Uploader
{
    protected $dir;
    protected $name;

    public function __construct( $options ) {
        $this->dir = $_SERVER[ 'DOCUMENT_ROOT' ] . $options[ 'dir' ];
        $this->name = $options[ 'input_name' ];
    }

    public function save( ) {
        if ( count ($_FILES) ) {

            $count = count ( $_FILES[ $this->name ] );

            for( $i=0; $i < $count; $i++ ) {

                if (  isset( $_FILES[ $this->name ][ 'size' ][ $i ] )   ) {

                    $array = explode('/', $_FILES[ $this->name ][ 'type' ][ $i ] );

                    if( count( $array ) === 2 ) {
                        $type = $array[ 1 ];
                        $name = $this->generateCode( 10 );
                        $name .= '.' . $type;
                        @mkdir( $this->dir, 0777 );
                        copy( $_FILES[ $this->name ][ 'tmp_name' ][ $i ], $this->dir . DIRECTORY_SEPARATOR . $name );
                        chmod( $this->dir . DIRECTORY_SEPARATOR . $name, 0777 );
                    }
                }
            }
            return;
        }
    }

    protected function generateCode( $length ) {
        $chars = 'ABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789';
        $code = '';
        $clen = strlen( $chars ) - 1;
        while ( strlen( $code ) < $length ) {
            $code .= $chars[mt_rand( 0, $clen )];
        }
        return $code;
    }
}
