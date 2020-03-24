<?php



class NewItemValidation{
 
    private $postdata;
    private $filedata;
    private $errors = [];
    private static $fields = ['category', 'headline', 'description', 'terms', 'pickuplocation'];
    
    public function __construct($post_data,$file_upload) {
        $this->postdata = $post_data;
        $this->filedata = $file_upload;
        
    }
    
    public function validateform(){
        foreach (self::$fields as $fields){
            if(!array_key_exists($fields, $this->postdata)){
                trigger_error("$fields is not present in postdata");
                return;
            }
        }
    
        $this->validatecategory();
        $this->validateheadline();
        $this->validatedescription();
        $this->validateterms();
       $this->validatepicture();
        $this->validatepickuplocation();
        return $this->errors;
        
        
    }
    
    private function validatecategory(){
        
        $val = trim($this->postdata['category']);
        if(empty($val)){
            $this->adderror('category', 'category cannot be empty');
        
        }else{
            if(!preg_match('/^[a-zA-Z0-9 ]{3,15}$/', $val)){
                $this->adderror('category', 'category must be between 3 and 15 characters long');
        }
    }
    }
    
    private function validateheadline(){
        
        $val = trim($this->postdata['headline']);
        if(empty($val)){
            $this->adderror('headline', 'headline cannot be empty');
        
        }else{
            if(!preg_match('/^[a-zA-Z0-9 ]{3,20}$/', $val)){
                $this->adderror('headline', 'headline must be between 3 and 15 characters long');
        }
    }
    }
    
    private function validatedescription(){
        
        $val = trim($this->postdata['description']);
        if(empty($val)){
            $this->adderror('description', 'description cannot be empty');
        
        }else{
            if(!preg_match('/^[a-zA-Z0-9 ]{3,70}$/', $val)){
                $this->adderror('description', 'description must be between 3 and 70 characters long');
            }
        }
    }
    
    private function validateterms(){
        
        $val = trim($this->postdata['terms']);
        if(empty($val)){
            $this->adderror('terms', 'terms cannot be empty');
        
        }else{
            if(!preg_match('/^[a-zA-Z0-9 ]{3,70}$/', $val)){
                $this->adderror('terms', 'terms must be between 3 and 70 characters long');
            }
        }
    }
    
   private function validatepicture(){
        
    //  var_dump($this->filedata);
        if (!file_exists($this->filedata['picture']['tmp_name'])) {
            $this->adderror('picture', 'please upload picture');
   }  
     
  }
     private function validatepickuplocation(){
        
        $val = trim($this->postdata['pickuplocation']);
        if(empty($val)){
            $this->adderror('pickuplocation', 'pickup location cannot be empty');
        
        }else{
            if(!preg_match('/^[a-zA-Z0-9 ]{3,70}$/', $val)){
                $this->adderror('pickuplocation', 'pickup location must be between 3 and 70 characters long');
        }
    }
    }
    
    private function adderror($key, $val){
        $this->errors[$key] = $val;
    }    
    
    public function addItem() {
        
        
               $db = new Dbconnect();
               $prep = $db->connect();
               
              

        
        $items = $prep->prepare('INSERT INTO items (category,headline,description,terms,pickuplocation,Owner) VALUES (?,?,?,?,?,?)');
        $items->bindValue(1,$this->postdata['category']);
        $items->bindValue(2,$this->postdata['headline']);
        $items->bindValue(3,$this->postdata['description']);
        $items->bindValue(4,$this->postdata['terms']);
        $items->bindValue(5,$this->postdata['pickuplocation']);
        $items->bindValue(6,$_SESSION["uid"]);
        $items->execute();
        
        
        
                
        $last_id = $prep->lastInsertId();
       
        $extension = pathinfo($this->filedata['picture']['name'], PATHINFO_EXTENSION);
        $filename = $last_id . '.' . $extension;       
           
      
        $target = __DIR__ . '\\..\\user-images\\' . $filename;
         if (move_uploaded_file($this->filedata['picture']['tmp_name'], $target)) {
            $response = array(
                "type" => "success",
                "message" => "Image uploaded successfully."
            );
        } else {
            $response = array(
                "type" => "error",
                "message" => "Problem in uploading image files."
            );
        }
        
              $picpath = '/user-images/' . $filename;
        $image = $prep->prepare('UPDATE items SET itempic=? WHERE iid =? ');
        $image->bindValue(1,$picpath);
        $image->bindValue(2,$last_id);
         $image->execute();
        
        
      
        
        

            
            
    
    
}


        }