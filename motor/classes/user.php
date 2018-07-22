<?php

	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class User {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_user;
		private $first_name;
		private $last_name;
		private $email;
		private $password;
		private $cpf;
		private $endereco;
		private $telefone;
		private $cep;
		private $tipo;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_user, $first_name, $last_name, $email, $password, $cpf, $endereco, $telefone, $cep, $tipo) { 
			$this->id_user = $id_user;
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->email = $email;
			$this->password = $password;
			$this->cpf = $cpf;
			$this->endereco = $endereco;
			$this->telefone = $telefone;
			$this->cep = $cep;
			$this->tipo = $tipo;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO user 
						  (
				 			id_user,
				 			first_name,
				 			last_name,
				 			email,
				 			password,
				 			cpf,
				 			endereco,
				 			telefone,
				 			cep,
				 			tipo
						  )  
				VALUES 
					(
				 			'$this->id_user',
				 			'$this->first_name',
				 			'$this->last_name',
				 			'$this->email',
				 			'$this->password',
				 			'$this->cpf',
				 			'$this->endereco',
				 			'$this->telefone',
				 			'$this->cep',
				 			'$this->tipo'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_user,
					 t1.first_name,
					 t1.last_name,
					 t1.email,
					 t1.password,
					 t1.cpf,
					 t1.endereco,
					 t1.telefone,
					 t1.cep,
					 t1.tipo
				FROM
					user AS t1
				WHERE
					t1.id_user  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_user,
					 t1.first_name,
					 t1.last_name,
					 t1.email,
					 t1.password,
					 t1.cpf,
					 t1.endereco,
					 t1.telefone,
					 t1.cep,
					 t1.tipo
				FROM
					user AS t1
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_user,
					 t1.first_name,
					 t1.last_name,
					 t1.email,
					 t1.password,
					 t1.cpf,
					 t1.endereco,
					 t1.telefone,
					 t1.cep,
					 t1.tipo
				FROM
					user AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Funcao que atualiza uma instancia no BD
		public function Update() {
			$sql = "
				UPDATE user SET
				
				  first_name = '$this->first_name',
				  last_name = '$this->last_name',
				  email = '$this->email',
				  password = '$this->password',
				  cpf = '$this->cpf',
				  endereco = '$this->endereco',
				  telefone = '$this->telefone',
				  cep = '$this->cep',
				  tipo = '$this->tipo'
				
				WHERE id_user = '$this->id_user';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Funcao que deleta uma instancia no BD
		public function Delete() {
			$sql = "
				DELETE FROM user
				WHERE id_user = '$this->id_user';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_user;
			$this->first_name;
			$this->last_name;
			$this->email;
			$this->password;
			$this->cpf;
			$this->endereco;
			$this->telefone;
			$this->cep;
			$this->tipo;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_user;
			$this->first_name;
			$this->last_name;
			$this->email;
			$this->password;
			$this->cpf;
			$this->endereco;
			$this->telefone;
			$this->cep;
			$this->tipo;
			
			
		}
			
	};

?>
