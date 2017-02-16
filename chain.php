<?php
    interface ICommand{
        function onCommand( $name, $args );
    }
 
    class CommandChain{
        private $_commands = array();
 
        public function addCommand( $cmd ){
            $this->_commands []= $cmd;
        }
 
        public function runCommand( $name, $args ){
            foreach( $this->_commands as $cmd ){
                if ( $cmd->onCommand( $name, $args ) )
                    return;
            }
        }
    }
 
    class testCommand implements ICommand{
        public function onCommand( $name, $args ){
            if ( $name != 'testing' ) return false;
                echo( "testCommand handling 'testing'  \n" );
            return true;
        }
    }
 
    class addCommand implements ICommand{
        public function onCommand( $name, $args ){
            if ( $name != 'addUser' ) return false;
                echo( "addCommand handling 'adding user'  \n" );
            return true;
        }
    }   
 
    $checkcommand = new CommandChain();
    $checkcommand->addCommand( new testCommand() );
    $checkcommand->addCommand( new addCommand() );
    $checkcommand->runCommand( 'testing', null );
    $checkcommand->runCommand( 'addUser', null );
?>