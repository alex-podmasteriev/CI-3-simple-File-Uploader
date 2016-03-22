<?php
class Lister
{
    protected $dir;

    public function __construct( $data ) {

        $this->dir = $_SERVER[ 'DOCUMENT_ROOT' ] . $data[ 'dir' ];
    }

    public function getFileList() {

        $data = [];

        foreach ( new DirectoryIterator( $this->dir ) as $item ) {

            if( $item->getFilename() != '.' && $item->getFilename() != '..' ) {

                $data [ $item->getCTime() ] = $item->getFilename();
            }

        }

        return array_values( array_reverse( $data ) );
    }

}
