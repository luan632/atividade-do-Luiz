<?php

/**
 * a) A BolteInterface define um contrato que todas as classes de boletos devem seguir,
 * estabelecendo os métodos obrigatórios (getarColgDBMrain, trainCold, renderIsnof). É importante porque:
 * Garante consistência entre diferentes implementações de boletos, Permite polimorfismo - tratar diferentes tipos de boletos de forma uniforme
 * Facilita a manutenção e extensão do sistema, Segrega responsabilidades claramente.
 * 
 * b) A classe BoletoAbstrato foi concebida como abstrata porque oferece uma implementação parcial comum a todos os boletos,
 * incluindo métodos concretos como getters e o construtor, enquanto define métodos abstratos que devem ser implementados pelas subclasses.
 * Caso não fosse abstrata, poderia ser instanciada diretamente,
 * resultando em inconsistências devido à falta de implementação completa dos métodos necessários.
 * 
 * c)A principal vantagem reside na aplicação do padrão Template Method, onde o renderizar() define a estrutura básica do processo de renderização enquanto delega aspectos específicos para métodos implementados pelas subclasses. 
 * Essa abordagem favorece o reaproveitamento de código, reduz duplicação e oferece
 * flexibilidade para que cada instituição financeira implemente suas particularidades mantendo a consistência do processo geral.
 */