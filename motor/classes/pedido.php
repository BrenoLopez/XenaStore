<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Pedido {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_pedido;
		private $id_user;
		private $id_produto;
		private $situacao;
		private $data_pedido;
		private $quantidade;
		private $valor_total;
		private $tamanho;
		private $forma_pagamento;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_pedido, $id_user, $id_produto, $situacao, $data_pedido, $quantidade, $valor_total, $tamanho, $forma_pagamento) { 
			$this->id_pedido = $id_pedido;
			$this->id_user = $id_user;
			$this->id_produto = $id_produto;
			$this->situacao = $situacao;
			$this->data_pedido = $data_pedido;
			$this->quantidade = $quantidade;
			$this->valor_total = $valor_total;
			$this->tamanho = $tamanho;
			$this->forma_pagamento = $forma_pagamento;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO pedido 
						  (
				 			id_pedido,
				 			id_user,
				 			id_produto,
				 			situacao,
				 			data_pedido,
				 			quantidade,
				 			valor_total,
				 			tamanho,
				 			forma_pagamento
						  )  
				VALUES 
					(
				 			'$this->id_pedido',
				 			'$this->id_user',
				 			'$this->id_produto',
				 			'$this->situacao',
				 			'$this->data_pedido',
				 			'$this->quantidade',
				 			'$this->valor_total',
				 			'$this->tamanho',
				 			'$this->forma_pagamento'
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
					 t1.id_pedido,
					 t1.id_user,
					 t1.id_produto,
					 t1.situacao,
					 t1.data_pedido,
					 t1.quantidade,
					 t1.valor_total,
					 t1.tamanho,
					 t1.forma_pagamento
				FROM
					pedido AS t1
				WHERE
					t1.id_pedido  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}


		public function ReadPedidos($id_user) {
			$sql = "
				SELECT
				* FROM
					pedido AS t1
				 JOIN produto AS p1
				ON
				t1.id_produto = p1.id_product
				WHERE
					t1.situacao = '0'
				AND t1.id_user= '$id_user';


			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		  public function ReadPedidos_novos( ) {
			$sql = "
				SELECT
				* FROM
					pedido AS t1
				 JOIN produto AS p1
				ON
				t1.id_produto = p1.id_product
				WHERE
					t1.situacao = '0'



			";
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}


		
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_pedido,
					 t1.id_user,
					 t1.id_produto,
					 t1.situacao,
					 t1.data_pedido,
					 t1.quantidade,
					 t1.valor_total,
					 t1.tamanho,
					 t1.forma_pagamento
				FROM
					pedido AS t1
				

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
					 t1.id_pedido,
					 t1.id_user,
					 t1.id_produto,
					 t1.situacao,
					 t1.data_pedido,
					 t1.quantidade,
					 t1.valor_total,
					 t1.tamanho,
					 t1.forma_pagamento
				FROM
					pedido AS t1
					
					
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
				UPDATE pedido SET
				
				  id_user = '$this->id_user',
				  id_produto = '$this->id_produto',
				  situacao = '$this->situacao',
				  data_pedido = '$this->data_pedido',
				  quantidade = '$this->quantidade',
				  valor_total = '$this->valor_total',
				  tamanho = '$this->tamanho',
				  forma_pagamento = '$this->forma_pagamento'
				
				WHERE id_pedido = '$this->id_pedido';
				
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
				DELETE FROM pedido
				WHERE id_pedido = '$this->id_pedido';
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
			$this->id_pedido;
			$this->id_user;
			$this->id_produto;
			$this->situacao;
			$this->data_pedido;
			$this->quantidade;
			$this->valor_total;
			$this->tamanho;
			$this->forma_pagamento;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_pedido;
			$this->id_user;
			$this->id_produto;
			$this->situacao;
			$this->data_pedido;
			$this->quantidade;
			$this->valor_total;
			$this->tamanho;
			$this->forma_pagamento;
			
			
		}
			
	};

?>
