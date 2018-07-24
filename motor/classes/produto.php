<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Produto {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_product;
		private $name_product;
		private $valor;
		private $category;
		private $quantidade;
		private $descricao;
		private $imagem;
		private $tema;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_product, $name_product, $valor, $category, $quantidade, $descricao, $imagem, $tema) { 
			$this->id_product = $id_product;
			$this->name_product = $name_product;
			$this->valor = $valor;
			$this->category = $category;
			$this->quantidade = $quantidade;
			$this->descricao = $descricao;
			$this->imagem = $imagem;
			$this->tema = $tema;
						
		}
		
		
		//Methods
		
		//Funcao que salva a instancia no BD
		public function Create() {
			
			$sql = "
				INSERT INTO produto 
						  (
				 			id_product,
				 			name_product,
				 			valor,
				 			category,
				 			quantidade,
				 			descricao,
				 			imagem,
				 			tema
						  )  
				VALUES 
					(
				 			'$this->id_product',
				 			'$this->name_product',
				 			'$this->valor',
				 			'$this->category',
				 			'$this->quantidade',
				 			'$this->descricao',
				 			'$this->imagem',
				 			'$this->tema'
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
					 t1.id_product,
					 t1.name_product,
					 t1.valor,
					 t1.category,
					 t1.quantidade,
					 t1.descricao,
					 t1.imagem,
					 t1.tema

				FROM
					produto AS t1
				WHERE
					t1.id_product  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}

       //função para retornar somentes produtos do tipo camisas;
		public function ReadProduto($categoria) {
			$sql = "
				SELECT
					 t1.id_product,
					 t1.name_product,
					 t1.valor,
					 t1.category,
					 t1.quantidade,
					 t1.descricao,
					 t1.imagem,
					 t1.tema

				FROM
					produto AS t1
				WHERE
					t1.category  = '$categoria'

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
					 t1.id_product,
					 t1.name_product,
					 t1.valor,
					 t1.category,
					 t1.quantidade,
					 t1.descricao,
					 t1.imagem,
					 t1.tema
				FROM
					produto AS t1
				

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
					 t1.id_product,
					 t1.name_product,
					 t1.valor,
					 t1.category,
					 t1.quantidade,
					 t1.descricao,
					 t1.imagem,
					 t1.tema
				FROM
					produto AS t1
					
					
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
				UPDATE produto SET
				
				  name_product = '$this->name_product',
				  valor = '$this->valor',
				  category = '$this->category',
				  quantidade = '$this->quantidade',
				  descricao = '$this->descricao',
				  imagem = '$this->imagem',
				  tema = '$this->tema',
				
				WHERE id_product = '$this->id_product';
				
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
				DELETE FROM produto
				WHERE id_product = '$this->id_product';
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
			$this->id_product;
			$this->name_product;
			$this->valor;
			$this->category;
			$this->quantidade;
			$this->descricao;
			$this->imagem;
			$this->tema;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_product;
			$this->name_product;
			$this->valor;
			$this->category;
			$this->quantidade;
			$this->descricao;
			$this->imagem;
			$this->tema;
			
			
		}
			
	};

?>
