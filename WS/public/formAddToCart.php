<?php
    include_once('../class/Cart.php');
    include_once('../modules/config.php');

    session_start();

    //verificar se os dados essenciais do formulário foram enviados corretamente (essas verificacoes vem do input)
    if ( isset($_POST) && isset($_POST['id']) &&  isset($_POST['qttProduct'])) {

        // veririfica se o usuario esta logado, caso nao esteja redirecion para o login
        if ( ! isset($_SESSION['login']) || ! $_SESSION['login'] ) {
            $_SESSION['msg'] = "Faça login para poder adicionar ao carrinho.";
            header("Location: ".SITE_ROOT."/public/login.php");
            return;
        }
        //obtém informações do usuário atualmente logado da variável de sessão 
        $userInfos = $_SESSION['user_info'];
        //instanciando a classe Cart
        $cart = new Cart();

        /*IF - verifica se o usuário possui um carrinho de compras ativo na sessão
        ELSE - caso nao tenha, cria um novo carrinho de compras associado ao usuário 
        e armazena o ID do carrinho na variável de sessão $_SESSION['cartId'].*/

        if ( !isset($_SESSION['cartId']) || empty($_SESSION['cartId']) ) {
            $idCart = $cart->create($userInfos[0]['id']); // criando o carrinho para poder adicionar itens nele
            $_SESSION['cartId'] = $idCart;
        }else{
            $idCart = $_SESSION['cartId'];
        }



        $productsInCart = $cart->getProductInCartByCartIdAndProductId($idCart, $_POST['id']);

        // se tiver vazia, insere um novo produto no products_cart
        if ( empty($productsInCart) ) {
            $addOnCart = $cart->addItem($idCart, $_POST['id'], $_POST['qttProduct']);// recebe um booleano true ou false
            // verifica se o item foi inserido com sucesso
            if( ! $addOnCart ) {
                $_SESSION['msg'] = "Ocorreu um erro ao cadastrar um produto!";
                header("Location: viewProduct.php?id=".$_POST['id']);
                return;
            }
        } else {
            $newQtt = $productsInCart[0]['quantity'] + $_POST['qttProduct'];
            
            $addOnCart = $cart->updateItem($idCart, $_POST['id'], $newQtt);// recebe um booleano true ou false
            // verifica se o item foi inserido com sucesso
            if( ! $addOnCart ) {
                $_SESSION['msg'] = "Ocorreu um erro ao cadastrar um produto!";
                header("Location: viewProduct.php?id=".$_POST['id']);
                return;
            }

        }
        

        $_SESSION['msg'] = "Produto adicionado no carrinho com sucesso!";
        header("Location: viewProduct.php?id=".$_POST['id']);
    }


?>