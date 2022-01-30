CREATE DATABASE teste_ipm;
CREATE TABLE tasks (
    id INT NOT NULL AUTO_INCREMENT,
    title varchar(255),
    description varchar(255),
    completed BOOLEAN,
    creation_date DATE,
    end_date DATE,
    PRIMARY KEY (id)
);

INSERT INTO tasks (title,description,completed,creation_date,end_date)
VALUES("primeiro teste","este é um teste para verificar o funcionamento da API",true,"2022-01-28","2022-01-30");
INSERT INTO tasks (title,description,completed,creation_date,end_date)
VALUES("segundo teste","este é o segundo teste para verificar o funcionamento da API",true,"2022-02-01","2022-02-28");