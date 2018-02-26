<?php
require_once 'Settings.php';
require_once 'StarterInput.php';
/**
 * Description of FormatPlainText
 * This class get settings from class which he is extends of, and create input, output and algorythm objects, with this 
 * settings. Also it provide few methods, that will calculate and return the results.
 * 
 * @author usfuprog
*/
class FormatePlainText extends Settings
{
    private $inpt, $algo, $output;
    
    public function __construct($num)
    {
        $sett = sprintf($this);
        if (!$sett)
            throw new Exception("Settings FAIL !!!");
//        eee($sett, __FILE__, __LINE__);
        $this->input = new StarterInput($this->getSettings(TPL_INPUT_NAME));
        $this->algo = new StarterInput($this->getSettings(TPL_ALGO_NAME));//will be StarterAlgorythm
        $this->output = new StarterInput($this->getSettings(TPL_OUTPUT_NAME));//will be StarterOutput
        
//        eee($sett, __FILE__, __LINE__);
    } 
}


//error_reporting(E_ALL & ~E_WARNING);
try
{
    $obj = new FormatePlainText(10);
    $val = 400;
    echo sprintf('%1$s %2$d <br>', TPL_ALGO_NAME, $val);
    
    
    //echo $obj;
} catch (Exception $ex) {

eee($ex->getMessage(), $ex->getFile(), $ex->getLine());
Die();
}
?>


<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <form method="POST" action="<?php echo filter_input(INPUT_SERVER, 'PHP_SELF') ?>"> 
            
            <select name="<?php echo TPL_INPUT_NAME ?>">
                <option>choose randomly</option>
                <option>select manualy</option>
            </select>
            <select name="<?php echo TPL_ALGO_NAME ?>">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
            <select name="<?php echo TPL_OUTPUT_NAME ?>">
                <option>html</option>
                <option>text file</option>
            </select>
            <button type="submit">>> GO >></button>
        </form>
        <?php //eee($obj, __FILE__, __LINE__) ?>
    </body>
</html>