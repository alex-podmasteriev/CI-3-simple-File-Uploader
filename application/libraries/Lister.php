<?php
class Lister
{
    protected $dir;

    public function __construct( $data ) {

        $this->dir = $_SERVER[ 'DOCUMENT_ROOT' ] . $data[ 'dir' ];
    }

    public function getFileList() {

        $data = [];
        $i = 0;
        foreach ( new DirectoryIterator( $this->dir ) as $item ) {

            if( $item->getFilename() != '.' && $item->getFilename() != '..' ) {

                $data [ $i ] = $item->getFilename();
                $i++;
            }

        }

        return array_values( array_reverse( $data ) );
    }

}
