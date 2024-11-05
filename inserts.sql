USE fornellis;

INSERT INTO produtos (nome, categoria, descricao, preco) VALUES
('Marguerita', 'Salgada', 'Tomate, mussarela e manjericão', 59.00),
('Frango com Catupiry', 'Salgada', 'Frango, catupiry, milho e azeitonas', 49.99),
('Quatro Queijos', 'Salgada', 'Queijo Mussarela, Parmesão, Gorgonzola e Provolone', 59.90),
('Calabresa', 'Salgada', 'Calabresa com Queijo', 47.99),
('Strogonoff de Frango', 'Salgada', 'Strogonoff de Frango, Queijo e Batata Palha ', 59.90),
('Pepperoni', 'Salgada', 'Pepperoni com Queijo', 49.99);


INSERT INTO produtos (nome, categoria, descricao, preco) VALUES
('Morango com Nutella', 'Doce', 'Chocolate e Morangos cobertos com Leite em Pó', 49.99),
('Chocolate com Gotas de Chocolate', 'Doce', 'Pizza doce com chocolate e gotas de chocolate', 49.90),
('Pizza com Bombom', 'Doce', 'Chocolate, Chocolate Branco, Confetes e Bombons', 49.90),
('Brigadeiro com Granulado', 'Doce', 'Chocolate com Granulados, Contornados por Avelã e Cerejas', 49.90),
('Chocolate com Marshmallow', 'Doce', 'Marshmellow Tostados com Morango', 55.90),
('Chocolate com M&M', 'Doce', 'Chocolate com M&M e Cobertura de Morango', 55.90);


INSERT INTO produtos (nome, categoria, descricao, preco) VALUES
('Sprite', 'Bebida', 'Sprite Lata 220ml', 5.00),
('Coca-Cola', 'Bebida', 'Coca Cola KS 290ml', 7.00),
('Guaraná Antártica', 'Bebida', 'Guaraná Lata 350ml', 6.00),
('Suco de Maracujá', 'Bebida', 'Suco Natural de Maracujá 500ml', 14.99),
('Suco de Laranja', 'Bebida', 'Suco Natural de Laranja 500ml', 14.99),
('Pepsi', 'Bebida', 'Pepsi lata 269ml', 5.99);

SELECT * FROM produtos;

INSERT INTO administrador (email, senha) VALUES
('admin@fornellis.com', 'admin123');

SELECT * FROM PRODUTOS;


