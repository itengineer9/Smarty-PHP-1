<?php

/**
 * Description of Templete
 *
 * @author ahmad
 */

interface TempleteInterface {
    /**
     * 
     * @param type $templete_file
     */
public function __construct($templete_file);

/**
 * replace any content of the the file
 * @param String $keyword what we need to change
 * @param String $replacement the new Test that we want to write it
 */

public function replace($keyword, $replacement);
/**
 * display the content in the internet site
 */
public function display();
/**
 * Return The Content of The File
 */
public function getContent();


}
class Template implements TempleteInterface{
    protected $content = '';
    public function __construct($templete_file) {
        if(file_exists('templates/'.$templete_file)){
            $this->content = file_get_contents('templates/'.$templete_file);
            $this->date();
            $this->time();
        }
        else{
            die('Fehler : Templete-Datei $template_file nicht gefunden');
        }
    }

    public function display() {
        echo $this->content;
    }

    public function getContent() {
        return $this->content ;
    }

    public function replace($keyword, $replacement) {
        $this->content =str_replace($keyword, $replacement, $this->content);
    }
    private function date() {
        $this->replace('DATE', date('d.m.y'));
    }
    private function time() {
        $this->replace('TIME', date("h:i:sa"));
        
    }
}

class NewLine {
    
    protected $content = '';
    public function readFile($filename) {
            if(file_exists($filename)){
                    $this->content = file_get_contents($filename);
                    file_put_contents($filename,$this->content);
                } else {
                        die('File $filename kann nicht gefungen');
            }
    }
    
    public function writeFile($filename) {
        $ausgabe =array();
        if(file_exists($filename)){
                    $ausgabe = explode(';', $this->content);
                    
            } else {
                        die('File $filename kann nicht gefungen');
            }
            
        for($i=0 ; $i< count($ausgabe);$i++){
            $cont= '.'.$ausgabe[$i].'<br>';
            file_put_contents($filename,$cont);
        }
    }
    public function display() {
         $this->content= explode(';', $this->content);
       
    }
    
}