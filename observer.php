<?php
    interface IObserver
    {
        function onChanged( $sender, $args );
    }
 
    interface IObservable
    {
        function addObserver( $observer );
    }
 
    class students implements IObservable
    {
        private $_observers = array();
 
        public function addStudent( $name )
        {
            foreach( $this->_observers as $obs )
            $obs->onChanged( $this, $name );
        }
 
        public function addObserver( $observer )
        {
            $this->_observers []= $observer;
        }
    }
 
    class studentListLogger implements IObserver
    {
        public function onChanged( $sender, $args )
        {
            echo( "$args added to students database\n" );
        }
    }
 
$studentList = new students();
$studentList->addObserver( new studentListLogger() );
$studentList->addStudent( "David Mbugua" );
?>