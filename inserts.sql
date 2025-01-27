USE fornellis;

INSERT INTO produtos (nome, categoria, descricao, preco, imagem) VALUES
('Marguerita', 'Salgada', 'Tomate, mussarela e manjericão', 59.00, 'imgs/cardapio/marguerita.jpg'),
('Frango com Catupiry', 'Salgada', 'Frango, catupiry, milho e azeitonas', 49.99, 'imgs/cardapio/Frango-com-catupiry.jpg'),
('Quatro Queijos', 'Salgada', 'Queijo Mussarela, Parmesão, Gorgonzola e Provolone', 59.90, 'imgs/cardapio/queijo-full.jpg'),
('Calabresa', 'Salgada', 'Calabresa com Queijo', 47.99, 'imgs/cardapio/calabresa.jpg'),
('Strogonoff de Frango', 'Salgada', 'Strogonoff de Frango, Queijo e Batata Palha ', 59.90, 'imgs/cardapio/strogonoff-de-frango.jpg'),
('Pepperoni', 'Salgada', 'Pepperoni com Queijo', 49.99, 'imgs/cardapio/pepperoni.jpg') ;


INSERT INTO produtos (nome, categoria, descricao, preco, imagem) VALUES
('Morango com Nutella', 'Doce', 'Chocolate e Morangos cobertos com Leite em Pó', 49.99, 'imgs/cardapio/morango.jpg'),
('Chocolate com Gotas de Chocolate', 'Doce', 'Pizza doce com chocolate e gotas de chocolate', 49.90, 'imgs/cardapio/gotas-chocolate.jpg'),
('Pizza com Bombom', 'Doce', 'Chocolate, Chocolate Branco, Confetes e Bombons', 49.90, 'imgs/cardapio/bombom.jpg'),
('Brigadeiro com Granulado', 'Doce', 'Chocolate com Granulados, Contornados por Avelã e Cerejas', 49.90, 'imgs/cardapio/chocolate-granulado.jpg'),
('Chocolate com Marshmallow', 'Doce', 'Marshmellow Tostados com Morango', 55.90, 'imgs/cardapio/Marshmello.jpg' ),
('Chocolate com M&M', 'Doce', 'Chocolate com M&M e Cobertura de Morango', 55.90, 'imgs/cardapio/M&M.jpg');


INSERT INTO produtos (nome, categoria, descricao, preco, imagem) VALUES
('Sprite', 'Bebida', 'Sprite Lata 220ml', 5.00, 'imgs/cardapio/sprite.jpg'),
('Coca-Cola', 'Bebida', 'Coca Cola KS 290ml', 7.00, 'imgs/cardapio/coca.jpg'),
('Guaraná Antártica', 'Bebida', 'Guaraná Lata 350ml', 6.00, 'imgs/cardapio/guarana.jpg'),
('Suco de Maracujá', 'Bebida', 'Suco Natural de Maracujá 500ml', 14.99, 'imgs/cardapio/maracuja.jpg'),
('Suco de Laranja', 'Bebida', 'Suco Natural de Laranja 500ml', 14.99, 'imgs/cardapio/laranja.jpg'),
('Pepsi', 'Bebida', 'Pepsi lata 269ml', 5.99, 'imgs/cardapio/pepsi.jpg');

INSERT INTO clientes (nome, email, senha, numero, endereco) VALUES
('Administrador', 'admin@fornellis.com', 'admin123', '', ''), ('João Lucas', 'joaolucastmagalhaes@gmail.com', 'senha123', '1921345672', 'Av 10, 128');