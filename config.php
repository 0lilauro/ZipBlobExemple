<?php 
Final class Connect {

    private $db;
	private $con;

	/**
    * Carrega uma instancia da classe de Conexao.
    *
    * @param Não Recebe
    *
    * @return  Não Retorna
    *
    */
    public function __construct($db_name="zippado"){
         $this->db = array(
            'tipo'=>'mysql',
            'servidor'=>'localhost',
            'usuario'=>'root',
            'senha'=>'',
            'database'=>$db_name

        );
       $this->access();
        return $this->con;
    }


    /**
    * Metodo de __get que retorna uma variavel privada.
    *
    * @param Recebe o nome da variavel que foi tentada a acessar 
    *
    * @return  Retorna o valor daquela variavel nessa classe.
    *
    */
    public function __get($name){
        if (strpos($name, 'con')!==false) {
            $this->access();
            return $this->con;
        }
    }
    // public function __set($nome, $valor="") {
    //     if (strpos($nome, 'con')!== false) {
    //         $this->con = $this->reconnect();
    //     }    
    // }



    /**
    * Cria a variavel de conexao e testa a conexão.
    *
    * @param Não Recebe
    *
    * @return Não retorna;
    *
    */
    public function access(){
        $this->con = null;
        $con = new PDO($this->db['tipo'].":host=".$this->db['servidor'].";dbname=".$this->db['database'], $this->db['usuario'], $this->db['senha']);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $con->setAttribute(PDO::ATTR_TIMEOUT,ini_get('max_execution_time'));
        $con->query("SET NAMES utf8;");
        
        try {
            $con->beginTransaction();
            $con->commit();
            
        } catch (PDOException $e) {
            echo "<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
                <div class='alert alert-danger'>
                  <strong>Erro!</strong>
                  <pre>
                      ".$e."
                  </pre>
                </div>";
        }
        $this->con=$con;
        return $con;
    }

     public function __destruct(){
        $this->db = null;
        $this->con = null;
    }
   
}