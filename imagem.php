<?php
    class imagem{
	/**
		* Valida uma imagem selecionada, move a mesma para o diretório definido e devolve um nome irrepetível (ou array de erros em caso de falha)
		* @author Rodrigo Moreira Barreto - Adaptado de http://rafaelcouto.com.br/upload-simples-de-imagem-com-php-mysql/
		* @param Arquivo $foto a foto a ser exibida, recuperada de $_FILES
		* @param int $larguraMaxima largura máxima permitida
		* @param int $alturaMaxima altura máxima permitida
		* @param int $tamanhoMaximo tamanho máximo permitido (em kb: cada 1mb +- 1000kb)
		* @param string $caminho diretorio para onde a imagem será movida
		* @return void
	*/
        public static function uploadImagem($foto, $larguraMaxima, $alturaMaxima, $tamanhoMaximo, $caminho)
        {
            
            $error = array();
            
            // Se a foto estiver sido selecionada
            if (!empty($foto["name"])) {

                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                $error[1] = "Isso não é uma imagem.";
                } 
            
                // Pega as dimensões da imagem
                $dimensoes = getimagesize($foto["tmp_name"]);
            
                // Verifica se a largura da imagem é maior que a largura permitida
                if($dimensoes[0] > $larguraMaxima) {
                    $error[2] = "A largura da imagem não deve ultrapassar ".$larguraMaxima." pixels";
                }
        
                // Verifica se a altura da imagem é maior que a altura permitida
                if($dimensoes[1] > $alturaMaxima) {
                    $error[3] = "Altura da imagem não deve ultrapassar ".$alturaMaxima." pixels";
                }
                
                // Verifica se o tamanho da imagem é maior que o tamanho permitido
                if($foto["size"] > ($tamanhoMaximo*1000)) {
                    $error[4] = "A imagem deve ter no máximo ".$tamanhoMaximo." bytes";
                }
        
                // Se não houver nenhum erro
                if (count($error) == 0) {
                
                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
        
                    // Gera um nome único para a imagem
                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        
                    // Caminho de onde ficará a imagem
                    $caminho_imagem = $caminho . $nome_imagem;
        
                    // Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
                    return $nome_imagem;
                }
                else
                    return $error;
            
            }
            
        }
    
    }

?>