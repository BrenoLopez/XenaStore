<?php

	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class User {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_user;
		private $first_name;
		private $last_name;
		private $telefone;
		private $email;
		private $cpf;
		private $password;
		private $estado;
		private $cidade;
		private $endereco;
		private $cep;
		private $tipo;
		private $bairro;
		private $numero;


		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_user, $first_name, $last_name, $telefone, $email, $cpf, $password, $estado, $cidade, $endereco, $cep, $tipo, $bairro, $numero) { 
			
			$this->id_user= $id_user;
			$this->first_name= $first_name;
			$this->last_name= $last_name;
			$this->telefone= $telefone;
			$this->email= $email;
			$this->cpf= $cpf;
			$this->password= $password;
			$this->estado= $estado;
			$this->cidade= $cidade;
			$this->endereco= $endereco;
			$this->cep= $cep;
			$this->tipo= $tipo;
			$this->bairro= $bairro;
			$this->numero= $numero;
						
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
						telefone,
						email,
						cpf,
						password,
						estado,
						cidade,
						endereco,
						cep,
						tipo,
						bairro,
						numero
						  )  
				VALUES 
					(
				 	        '$this->id_user',
                            '$this->first_name',
                            '$this->last_name',
                            '$this->telefone',
                            '$this->email',
                            '$this->cpf',
                            '$this->password',
                            '$this->estado',
                            '$this->cidade',
                            '$this->endereco',
                            '$this->cep',
                            '$this->tipo',
                            '$this->bairro',
                            '$this->numero'
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
						t1.telefone,
						t1.email,
						t1.cpf,
						t1.password,
						t1.estado,
						t1.cidade,
						t1.endereco,
						t1.cep,
						t1.tipo,
						t1.bairro,
						t1.numero
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
		public function ReadFunc() {
			$sql = "
				SELECT
					    t1.id_user,
						t1.first_name,
						t1.last_name,
						t1.telefone,
						t1.email,
						t1.cpf,
						t1.password,
						t1.estado,
						t1.cidade,
						t1.endereco,
						t1.cep,
						t1.tipo,
						t1.bairro,
						t1.numero
				FROM
					user AS t1
				WHERE 
					t1.tipo='1';

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

		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadCli() {
			$sql = "
				SELECT
					    t1.id_user,
						t1.first_name,
						t1.last_name,
						t1.telefone,
						t1.email,
						t1.cpf,
						t1.password,
						t1.estado,
						t1.cidade,
						t1.endereco,
						t1.cep,
						t1.tipo,
						t1.bairro,
						t1.numero
				FROM
					user AS t1
				WHERE 
					t1.tipo='0';

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
		
		public function ReadByEmail($email){
			$sql = "
				SELECT *
				FROM
					user AS t1
				WHERE
					t1.email = '$email'
			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					    t1.id_user,
						t1.first_name,
						t1.last_name,
						t1.telefone,
						t1.email,
						t1.cpf,
						t1.password,
						t1.estado,
						t1.cidade,
						t1.endereco,
						t1.cep,
						t1.tipo,
						t1.bairro,
						t1.numero
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
				  
				   id_user= '$this->id_user',
				   first_name= '$this->first_name',
				   last_name= '$this->last_name',
				   telefone= '$this->telefone',
				   email= '$this->email',
				   cpf= '$this->cpf',
				   password= '$this->password',
				   estado= '$this->estado',
				   cidade= '$this->cidade',
				   endereco= '$this->endereco',
				   cep= '$this->cep',
				   tipo= '$this->tipo',
				   bairro= '$this->bairro',
				   numero= '$this->numero'

				
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
