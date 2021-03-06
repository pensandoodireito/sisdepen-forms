<?php

namespace PensandoODireito\SisdepenFormsBundle\DataFixtures\MongoDB;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Renatomefi\FormBundle\Document\Form;
use Renatomefi\FormBundle\Document\FormField;
use Renatomefi\FormBundle\Document\FormFieldDepends;
use Renatomefi\TranslateBundle\DataFixtures\MongoDB\LoadLangs;
use Renatomefi\TranslateBundle\Document\Language;
use Renatomefi\TranslateBundle\Document\Translation;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Carrega os campos do formulário INSPEÇÃO EM ESTABELECIMENTOS PENAIS LoadInspEstPenaisForm
 *
 * Class LoadFormFields
 * @package PensandoODireito\SisdepenFormsBundle\DataFixtures\MongoDB
 * @codeCoverageIgnore
 */
class LoadFormFields extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public static $fields = [
        // BEGIN page 1
        [
            'name' => '1',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Esfera'
            ],
            'options' => [
                'estadual' => 'Estadual',
                'federal' => 'Federal',
            ],
            'type' => 'select'
        ],
        [
            'name' => '2',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Secretaria da pasta'
            ],
            'options' => [
                'Própria',
                'Subsecretaria',
                'Diretoria / Departamento',
                'Superintendência',
                'Instituto / Agência',
                'other' => 'Outro',
            ],
            'type' => 'select'
        ],
        [
            'name' => '3_1',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Unidade do MP'
            ],
            'type' => 'text'
        ],
        [
            'name' => '3_2',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Defensoria'
            ],
            'type' => 'text'
        ],
        [
            'name' => '4',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Tribunal de Justiça'
            ],
            'type' => 'text'
        ],
        [
            'name' => '5',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Grau de Jurisdição'
            ],
            'type' => 'text'
        ],
        [
            'name' => '6',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Comarca'
            ],
            'type' => 'text'
        ],
        [
            'name' => '7',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Escola Penitenciária Estadual?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '8',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Ouvidoria Estadual do Sistema Prisional?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '9',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Corregedoria Estadual do Sistema Prisional?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '10',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Plano de Carreira?'
            ],
            'options' => [
                'Sim', // Exibir: Todos os servidores penitenciarios , Agentes penitenciarios , Outro
                'Não',
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '10_1',
            'page' => '1',
            'depends_on' => [
                'field' => '1_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'options' => [
                'Todos os servidores penitenciarios',
                'Agentes penitenciarios',
                'other' => 'Outro',
            ],
            'type' => 'select'
        ],
        [
            'name' => '11',
            'page' => '1',
            'translate' => [
                'pt-br' => 'Há Plano Estadual de Educação do Sistema Penitenciário?'
            ],
            'type' => 'boolean'
        ],
        // END page 1

        // BEGIN page 2
        [
            'name' => '1',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento'
            ],
            'type' => 'text'
        ],
        [
            'name' => '2',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Apelido da unidade'
            ],
            'type' => 'text'
        ],
        [
            'name' => '3',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Endereço'
            ],
            'type' => 'text'
        ],
        [
            'name' => '4',
            'page' => '2',
            'translate' => [
                'pt-br' => 'CEP'
            ],
            'type' => 'text'
        ],
        [
            'name' => '5',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Cidade/UF'
            ],
            'type' => 'text'
        ],
        [
            'name' => '6',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao recolhimento de presos provisórios'
            ],
            // helper  Ex: Cadeia Pública; Presídio; Centro de Detenção Provisória; Unidade de Recolhimento Provisório
            'type' => 'boolean'
        ],
        [
            'name' => '7',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de pena em regime fechado'
            ],
            // helper  Ex: Penitenciária
            'type' => 'boolean'
        ],
        [
            'name' => '8',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de pena em regime semiaberto'
            ],
            // helper Ex: Colônias agrícolas, industriais ou similares; Centro de Progressão Penitenciária; Unidade de Regime Semiaberto; Centro de Integração Social
            'type' => 'boolean'
        ],
        [
            'name' => '9',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de regime aberto ou de limitação de fim de semana'
            ],
            // helper Ex: Casa de Albergado
            'type' => 'boolean'
        ],
        [
            'name' => '10',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado ao cumprimento de medida de segurança de internação ou tratamento ambulatoria'
            ],
            // helper Ex: Hospital de Custódia e Tratamento Psiquiátrico
            'type' => 'boolean'
        ],
        [
            'name' => '11',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado a diversos tipos de regime'
            ],
            // helper Ex: Centro de Ressocialização
            'type' => 'boolean'
        ],
        [
            'name' => '12',
            'page' => '2',
            'translate' => [
                'pt-br' => 'Estabelecimento destinado à realização de exames gerais e criminológico'
            ],
            // helper Ex: Centro de Observação Criminológica e Triagem
            'type' => 'boolean'
        ],
        [
            'name' => '13',
            'page' => '2',
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'radio',
            'options' => [
                'Masculino',
                'Feminino',
                'Misto'
            ],
        ],
        // END page 2

        // BEGIN page 3
        [
            'name' => '1',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Gestão'
            ],
            'type' => 'multicheckbox',
            'options' => [
                'Pública',
                'Terceirização de serviços complementares',
                'Terceirização da equipe técnica e administrativa',
                'Terceirização da equipe de segurança',
                'Método APAC',
            ]
        ],
        [
            'name' => '2',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Responsável pelo estabelecimento'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Cargo'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Formação Profissional'
            ],
            'type' => 'select',
            'options' => [
                'Direito',
                'Ciências Sociais',
                'Psicologia',
                'Pedagogia',
                'Administração',
                'Serviço Social',
                'other' => 'Outra',
            ]
        ],

        [
            'name' => '5',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Responsável pela segurança'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Cargo'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Formação Profissional'
            ],
            'type' => 'select',
            'options' => [
                'Direito',
                'Ciências Sociais',
                'Psicologia',
                'Pedagogia',
                'Administração',
                'Serviço Social',
                'other' => 'Outra',
            ]
        ],
        [
            'name' => '8',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Quantidade de computadores'
            ],
            'type' => 'select',
            'options' => [
                '1 a 3',
                '4 a 6',
                '7 a 9',
                '10 a 12',
                '13 a 15',
                '+15',
            ]
        ],
        [
            'name' => '9',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Acesso a internet'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Alimenta o INFOPEN'
            ],
            'type' => 'select',
            'options' => [
                'Integralmente',
                'Parcialmente',
                'Não alimenta',
                'Mensal',
                'Trimestral',
                'Semestral',
                'Anual',
                'other' => 'Outro',
            ]
        ],
        [
            'name' => '11',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Regulamento interno da unidade/Estado'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12',
            'page' => '3',
            'translate' => [
                'pt-br' => 'Regulamento disciplinar penitenciário da unidade/Estado'
            ],
            'type' => 'boolean',
        ],
        //END page 3

        //BEGIN page 4
        [
            'name' => '1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Capacidade total'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação total'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Capacidade Mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Condenada'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_1_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Provisória'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Capacidade Homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Condenada'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_1_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Provisória'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Capacidade LGBT'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Condenada'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_1_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Provisória'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para diferentes regimes?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para presos provisórios e condenados?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para idosos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para mulheres, se for o caso?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '9',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para pessoas em medida de segurança?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há alas separadas para LGBT?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há local especial para cumprimento de seguro/custódia diferenciada?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há acessibilidade para pessoas com deficiência?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '13',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Há celas metálicas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '14_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_1_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_1_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_1_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_1_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_1_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_2_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_2_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_2_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_2_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_2_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_2_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_3_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_3_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_3_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_3_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_3_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_3_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_4_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_4_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_4_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_4_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_4_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_4_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_5_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_5_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_5_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_5_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_5_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_5_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_6_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_6_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_6_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_6_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_6_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_6_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_7_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_7_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_7_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_7_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_7_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_7_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_8_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_8_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_8_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_8_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_8_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_8_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_9_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_9_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_9_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_9_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_9_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_9_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_10_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_10_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_19_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_10_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_10_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_10_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_11_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_11_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_11_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_11_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_11_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_11_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_12_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_12_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_12_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_12_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_12_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_12_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_13_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_13_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_13_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_13_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_13_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_13_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_14_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_14_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_14_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_14_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_14_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_14_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_15_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_15_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_15_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_15_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_15_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_15_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_16_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_16_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_16_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_16_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_16_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_16_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_17_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_17_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_17_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_17_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_17_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_17_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_18_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Penitenciária'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_18_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Colonia'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_18_3',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Cadeia publica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_18_4',
            'page' => '4',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_18_5',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Casa do albergado'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_18_6',
            'page' => '4',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Número de celas individuais Homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Número de celas individuais Mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação celas individuais Homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Dimensão Homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação celas individuais Mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_2_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Dimensão Mulheres'
            ],
            'type' => 'text',
        ],

        [
            'name' => '16_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Número de celas homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_1_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Número de celas mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_2_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Capacidade média das celas coletivas homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_2_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Capacidade média das celas coletivas mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_3_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação média das celas coletivas homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_3_1_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Dimensão'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_3_2',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Lotação média das celas coletivas mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_3_2_1',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Dimensão'
            ],
            'type' => 'text',
        ],
        [
            'name' => '17',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Permeabilidade'
            ],
            'type' => 'select',
            'options' => [
                '1 a 3%',
                '3 a 5%',
                '5 a 10%',
                '>10%',
            ]
        ],
        [
            'name' => '18',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Ventilação cruzada geral'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
                'Excessiva',
            ]
        ],
        [
            'name' => '19',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Ventilação cruzada nas celas'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
                'Excessiva',
            ]
        ],
        [
            'name' => '20',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Iluminação natural nas celas'
            ],
            'type' => 'select',
            'options' => [
                'Inexistente',
                'Existente',
            ]
        ],
        [
            'name' => '21',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Incidência de sol nas celas'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
                'Excessiva',
            ]
        ],
        [
            'name' => '22',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Programa de combate a incêndio'
            ],
            'type' => 'select',
            'options' => [
                'Inexistente',
                'Existente',
            ]
        ],
        [
            'name' => '23',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Extintores de incêndio'
            ],
            'type' => 'select',
            'options' => [
                'Insuficiente',
                'Suficiente',
                'Sem condições de uso',
                'Em condições de uso',
            ]
        ],
        [
            'name' => '24',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Construído ou ampliado com subvenção de recursos federais?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '25',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Reformado com subvenção de recursos federais?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '26',
            'page' => '4',
            'translate' => [
                'pt-br' => 'Indicativos da atuação de facções no estabelecimento?'
            ],
            'type' => 'boolean',
            // Quais???
        ],
        [
            'name' => '26_1',
            'page' => '4',
            'depends_on' => [
                'field' => '4_26',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quais'
            ],
            'type' => 'text',
        ],

        //END page 4


        //BEGIN page 5
        [
            'name' => '1',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas com deficiência?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '1_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_1',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text'
        ],
        [
            'name' => '2',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas com mais de 60 anos presas?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '2_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_2',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text'
        ],
        [
            'name' => '3',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há indígenas presos?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '3_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_3',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text'
        ],
        [
            'name' => '4',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há notificação para Funai quanto ao ingresso do indígena?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há estrangeiros presos?'
            ],
            'type' => 'boolean',
            // Quantidade?
        ],
        [
            'name' => '5_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há adolescentes internados no local?'
            ],
            'type' => 'boolean',
            // Quantidade?
        ],
        [
            'name' => '6_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_6',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Os adolescentes estão separados dos adultos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Providências adotadas em relação à separação imediata e retirada do(s) adolescente(s)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com transtorno mental?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '9_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_9',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '10',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas em tratamento para dependência química?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '10_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '11',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Diabetes?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '11_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_11',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '12',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Hipertensão?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '12_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_12',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '13',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com HIV?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '13_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_13',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Hepatite?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '14_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_14',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Tuberculose?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '15_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_15',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas com Hanseníase?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '16_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_16',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '17',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há pessoas presas em RDD?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '17_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_17',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '18',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há presas gestantes?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '18_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_18',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '19',
            'page' => '5',
            'translate' => [
                'pt-br' => 'Há crianças permanecendo com suas mães presas?'
            ],
            'type' => 'boolean',
            // Quantidade???
        ],
        [
            'name' => '19_1',
            'page' => '5',
            'depends_on' => [
                'field' => '5_19',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        //END page 5

        //BEGIN page 6
        [
            'name' => '1',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Quantidade de pessoas cumprindo medida de internação'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Quantidade de pessoas cumprindo medida ambulatorial'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Pacientes com mais tempo de internação'
            ],
            'type' => 'select',
            'options' => [
                //Quantidade?
                'até 1 ano',
                'de 1 a 3 anos',
                'de 4 a 6 anos',
                'de 7 a 9 anos',
                'de 10 a 20 anos',
                'de 21 a 30 anos',
                'mais que 30 anos',
            ]
        ],
        [
            'name' => '3_1',
            'page' => '6',
            'depends_on' => [
                'field' => '6_3',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Há pacientes com alta médica?'
            ],
            'type' => 'boolean',
            //Quantidade?
        ],
        [
            'name' => '4_1',
            'page' => '6',
            'depends_on' => [
                'field' => '6_4',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Pacientes indultados no último ano'
            ],
            'type' => 'boolean',
            //Quantidade?
        ],
        [
            'name' => '5_1',
            'page' => '6',
            'depends_on' => [
                'field' => '6_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Pacientes encaminhados no último ano para'
            ],
            'type' => 'select',
            'options' => [
                'Centro de Atenção Psicossocial - CAPS',
                'Serviços Residenciais Terapêuticos -SRTs',
                'Programa de Volta para Casa – PVC',
                'other' => 'Outro',
            ]
        ],
        [
            'name' => '7',
            'page' => '6',
            'translate' => [
                'pt-br' => 'Periodicidade do exame de cessação de periculosidade'
            ],
            'type' => 'select',
            'options' => [
                'Centro de Atenção Psicossocial - CAPS',
                'Serviços Residenciais Terapêuticos -SRTs',
                'Programa de Volta para Casa – PVC',
                'other' => 'Outro',
            ]
        ],
        //END page 6

        //BEGIN page 7

        [
            'name' => '1',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total de RH na área de segurança'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total de RH na área administrativa'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total de RH na área técnica'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Total Geral'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Advogados / Defensores Públicos alocados na unidade'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="Defensoria Pública ">Defensoria Pública</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Outra forma de contratação">Outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '5_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'Defensoria Pública',
                'Própria Unidade',
                'other' => 'Outra forma de contratação',
            ]
        ],
        [
            'name' => '5_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '6',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Auxiliares de Enfermagem'
            ],
            'type' => 'boolean',
            /**
             *   <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '6_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_6',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_6',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '6_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_6',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '7',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Assistentes Sociais'
            ],
            'type' => 'boolean',
            /**
             *            <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '7_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_7',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_7',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUAS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '7_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_7',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '8',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Dentistas'
            ],
            'type' => 'boolean',
            /**
             *           <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '8_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_8',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_8',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '8_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_8',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '9',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Enfermeiros'
            ],
            'type' => 'boolean',
            /**
             *           <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '9_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_9',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_9',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '9_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_9',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '10',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Médicos - Clínico Geral'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '10_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '10_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '10_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '11',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Médicos - Psiquiatras'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '11_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_11',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '11_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_11',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '11_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_11',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '12',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Médicos - Ginecologista'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '12_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_12',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '12_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_12',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '12_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_12',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '13',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Pedagogos'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="Secretaria de Educação">Secretaria de Educação</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '13_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_13',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '13_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_13',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'Secretaria de Educação',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '13_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_13',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '14',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Psicólogos'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="SUAS">SUAS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '14_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_14',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_14',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'SUAS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '14_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_14',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '15',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Terapeutas Ocupacionais'
            ],
            'type' => 'boolean',
            /**
             *             <!-- Quantidade ?-->
             * <option value="SUS">SUS</option>
             * <option value="Própria Unidade">Própria Unidade</option>
             * <option value="Terceirizado/outra forma de contratação">Terceirizado/outra forma de contratação</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</option>
             */
        ],
        [
            'name' => '15_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_15',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_15',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'SUS',
                'Própria Unidade',
                'other' => 'Terceirizado/outra forma de contratação',
            ]
        ],
        [
            'name' => '15_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_15',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '16',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Outros'
            ],
            'type' => 'text',
            /**
             * <!-- Quantidade ?-->
             * <option value="Própria Unidade">Própria Unidade</option>
             * <!-- Periodicidade/ frequência -->
             * <option value="Mensal">Mensal</option>
             * <option value="Quinzenal">Quinzenal</option>
             * <option value="Semanal">Semanal</option>
             * <option value="Diária">Diária</optio
             */
        ],
        [
            'name' => '16_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_16',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '16_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_16',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'Própria Unidade',
            ]
        ],
        [
            'name' => '16_3',
            'page' => '7',
            'depends_on' => [
                'field' => '7_16',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],
        [
            'name' => '17',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Agentes Prisionais'
            ],
            'type' => 'boolean',
            /**
             * <!-- Quantidade ?-->
             * <option value="homens">homens</option>
             * <option value="mulheres">mulheres</option>
             */
        ],
        [
            'name' => '17_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_17',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade homens'
            ],
            'type' => 'text',
        ],
        [
            'name' => '17_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_17',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quantidade mulheres'
            ],
            'type' => 'text',
        ],
        [
            'name' => '18',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Escala de trabalho'
            ],
            'type' => 'text',
        ],
        [
            'name' => '19',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Há utilização de uniforme?'
            ],
            'type' => 'boolean',
            /**
             * <option value="Com identificação pessoal">Com identificação pessoal</option>
             */
        ],
        [
            'name' => '19_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_19',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Com identificação pessoal'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '20',
            'page' => '7',
            'translate' => [
                'pt-br' => 'Quais os tipos de cursos ocorrem para o treinamento dos agentes?'
            ],
            'type' => 'select',
            'options' => [
                'Curso de Formação',
                'Cursos Especiais',
            ]
        ],
        [
            'name' => '20_1',
            'page' => '7',
            'depends_on' => [
                'field' => '7_20',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Entidade Executora'
            ],
            'type' => 'text',
        ],
        [
            'name' => '20_2',
            'page' => '7',
            'depends_on' => [
                'field' => '7_20',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Periodicidade/ frequência'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Quinzenal',
                'Semanal',
                'Diária',
            ]
        ],

        //END page 7

        //BEGIN page 8
        [
            'name' => '1',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há camas e colchões para todos os presos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de uniformes?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '3',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de calçados?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '4',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de roupas de cama?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de toalhas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Periodicidade de substituição do material entregue'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de artigos de higiene pessoal?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7_1',
            'page' => '8',
            'depends_on' => [
                'field' => '8_7',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de artigos de limpeza?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8_1',
            'page' => '8',
            'depends_on' => [
                'field' => '8_8',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de absorventes para as mulheres?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica'
            ]
        ],
        [
            'name' => '10',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há distribuição de fraldas, se for o caso?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica'
            ]
        ],
        [
            'name' => '11',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há local destinado à venda de produtos e objetos permitidos e não fornecidos pela administração?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11_1',
            'page' => '8',
            'depends_on' => [
                'field' => '8_11',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Descrever como é feito o pagamento, controle de preços e destino da receita'
            ],
            'type' => 'text',
        ],
        [
            'name' => '12',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Descrever a mobília que compõe as celas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '13',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há sanitário e lavatório em todas as celas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '14',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Caso não haja instalações sanitárias na cela, como é garantido o acesso aos banheiros externos?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É garantido o acesso ao banheiro no período noturno?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '16',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Número de pessoas por vaso sanitário'
            ],
            'type' => 'text',
        ],
        [
            'name' => '17',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É garantido a qualquer momento o uso da descarga do vaso sanitário?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '18',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Há privacidade para uso das instalações sanitárias?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '19',
            'page' => '8',
            'translate' => [
                'pt-br' => 'Número de pessoas por chuveiro'
            ],
            'type' => 'text',
        ],
        [
            'name' => '20',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É garantido o banho diário?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '21',
            'page' => '8',
            'translate' => [
                'pt-br' => 'A água é aquecida?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '22',
            'page' => '8',
            'translate' => [
                'pt-br' => 'É fornecida água potável?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '23',
            'page' => '8',
            'translate' => [
                'pt-br' => 'A água é racionada?'
            ],
            'type' => 'boolean',
            //Qual a frequência e duração oferecida?
        ],
        [
            'name' => '23_1',
            'page' => '8',
            'depends_on' => [
                'field' => '8_23',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Qual a frequência e duração oferecida?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '24',
            'page' => '8',
            'translate' => [
                'pt-br' => 'A água é racionada?'
            ],
            'type' => 'select',
            'options' => [
                'Hidráulico',
                'Elétrica',
                'Edificação',
                'other' => 'Outros',
            ]
        ],
        //END page 8

        //BEGIN page 9
        [
            'name' => '1',
            'page' => '9',
            'translate' => [
                'pt-br' => 'A alimentação é preparada na própria unidade?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '2',
            'page' => '9',
            'depends_on' => [
                'field' => '9_1',
                'value' => false
            ],
            'translate' => [
                'pt-br' => 'Em caso negativo, de onde provém Qual o custo diário da alimentação por preso?'
            ],
            'type' => 'text'
        ],
        [
            'name' => '3',
            'page' => '9',
            'translate' => [
                'pt-br' => 'O cardápio é orientado por nutricionista?'
            ],
            'type' => 'boolean'
        ],
        [
            'name' => '4',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Qual a quantidade de alimentação fornecida no almoço e janta à pessoa presa (peso)?'
            ],
            'type' => 'text'
        ],
        [
            'name' => '5',
            'page' => '9',
            'translate' => [
                'pt-br' => 'N.º de refeições diárias'
            ],
            'type' => 'text'
        ],
        [
            'name' => '6',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Horários das refeições'
            ],
            'type' => 'text'
        ],
        [
            'name' => '7',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Onde as refeições são realizadas?'
            ],
            'type' => 'select',
            'options' => [
                'Celas',
                'Refeitorio',
                'other' => 'Outro',
            ]
        ],
        [
            'name' => '8',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Há controle de qualidade?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '9',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Descrever o controle'
            ],
            'type' => 'text',
        ],
        [
            'name' => '10',
            'page' => '9',
            'translate' => [
                'pt-br' => 'As refeições são adaptadas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10_1',
            'page' => '9',
            'depends_on' => [
                'field' => '9_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Adaptadas por motivos de'
            ],
            'type' => 'select',
            'options' => [
                'Saúde',
                'Religiosos',
                'other' => 'Outros',
            ]
        ],
        [
            'name' => '11',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Os presos deslocados para audiências e outras atividades externas recebem alimentação e água potável quando saem e quando retornam, independentemente do horário?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12',
            'page' => '9',
            'translate' => [
                'pt-br' => 'Há outras formas de fornecimento de alimentos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '12_1',
            'page' => '9',
            'depends_on' => [
                'field' => '9_12',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'As refeições são'
            ],
            'type' => 'select',
            'options' => [
                'Família',
                'Compra',
                'other' => 'Outro',
            ]
        ],
        //END page 9

        //BEGIN page 10
        [
            'name' => '1',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo diário dentro da cela'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de pátio de sol'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_2',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de visita'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_3',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades educacionais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_4',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades laborais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades religiosas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_6',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de visita íntima'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_7',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo de atividades esportivas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_8',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Tempo das atividades culturais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_9',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '10',
            'page' => '10',
            'translate' => [
                'pt-br' => 'Há programa individualizado para o cumprimento da pena?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10_1',
            'page' => '10',
            'depends_on' => [
                'field' => '10_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Qual a freqüência de atualização'
            ],
            'type' => 'select',
            'options' => [
                'Mensal',
                'Trimestral',
                'Semestral',
                'other' => 'Outro',
            ]
        ],
        [
            'name' => '10_2',
            'page' => '10',
            'depends_on' => [
                'field' => '10_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quais profissionais participam da elaboração do programa'
            ],
            'type' => 'text',
        ],
        [
            'name' => '10_3',
            'page' => '10',
            'depends_on' => [
                'field' => '10_10',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Descreva os procedimentos para elaboração do programa individualizado'
            ],
            'type' => 'text',
        ],
        //END page 10

        //BEGIN page 11
        [
            'name' => '1',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Existe unidade básica de saúde do SUS?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Está integrado à Rede Cegonha do SUS?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '3',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há distribuição de preservativos?'
            ],
            'type' => 'boolean',
            //frequencia
        ],
        [
            'name' => '3_1',
            'page' => '11',
            'depends_on' => [
                'field' => '11_3',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há acesso às medicações definidas pelo SUS para farmácias de unidades prisionais?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há acesso às medicações prescritas que não estão no pacote SUS?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há exames e consultas de ingresso?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há pré-natal para presas gestantes?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há vacinação regular?'
            ],
            'type' => 'boolean',
            // Se sim, quais vacinas são oferecidas?
        ],
        [
            'name' => '8_1',
            'page' => '11',
            'depends_on' => [
                'field' => '11_8',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quais vacinas são oferecidas?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '11',
            'translate' => [
                'pt-br' => 'As pessoas presas têm acesso a médico particular, caso haja a contratação deste profissional por seus familiares?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '11',
            'translate' => [
                'pt-br' => 'As pessoas presas têm acesso aos exames médicos necessários?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Quais trabalhos são realizados para prevenção ou controle de doenças infecto-contagiosas?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '12',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Há ambulância na unidade?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '13',
            'page' => '11',
            'translate' => [
                'pt-br' => 'Para que estabelecimentos da rede de saúde as pessoas presas tem acesso, quando necessário?'
            ],
            'type' => 'select',
            'options' => [
                'Unidade Básica de Saúde – UBS',
                'Unidade de Pronto Atendimento – UPA',
                'Hospital',
                'Centro de Atendimento Psicossocial – CAPS',
                'other' => 'Outro',
            ]
        ],
        //END page 11

        //BEGIN page 12
        [
            'name' => '1_1_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_7_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_7_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_7_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_7_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_7_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_8_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_8_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_8_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_8_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_8_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_9_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_9_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_9_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_9_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_9_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_10_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_10_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_10_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_10_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_10_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_11_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_11_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_11_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_11_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_11_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_12_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_12_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_12_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_12_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_12_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_13_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_13_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_13_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_13_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_13_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_14_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_14_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_14_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_14_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_14_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_15_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_15_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_15_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_15_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_15_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_16_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_16_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_16_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_16_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_16_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_17_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_17_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_17_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_17_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_17_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_18_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_18_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_18_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_18_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_18_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_19_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_19_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_19_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_19_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_19_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_20_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_20_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_20_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_20_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_20_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_21_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_21_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_21_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_21_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_21_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_22_1',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Penintenciaria'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_22_2',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Cadeia Pública ou estabelecimento congênere'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_22_3',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Colônia Agrícola, Industrial ou silimar'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_22_4',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Centro de Observação Criminológico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_22_5',
            'page' => '12',
            'translate' => [
                'pt-br' => 'Hospital de Custódia e Tratamento Psiquiátrico'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        //END page 12

        //BEGIN page 13
        [
            'name' => '1',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Às pessoas presas sem condições financeiras é proporcionada assistência jurídica gratuita e permanente?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'depends_on' => [
                'field' => '13_1',
                'value' => null
            ],
            'page' => '13',
            'translate' => [
                'pt-br' => 'Em caso positivo, por quem é prestada a assistência?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '13',
            'translate' => [
                'pt-br' => 'A Funai presta assistência jurídica aos presos/internos indígenas?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica',
            ]
        ],
        [
            'name' => '4',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Onde é realizado o contato entre a pessoa presa e o advogado?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '13',
            'translate' => [
                'pt-br' => 'A Defensoria Pública do Estado comparece com regularidade?'
            ],
            'type' => 'boolean',
            // Periodicidade
        ],
        [
            'name' => '5_1',
            'depends_on' => [
                'field' => '13_5',
                'value' => null
            ],
            'page' => '13',
            'translate' => [
                'pt-br' => 'Periodicidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Saídas temporárias'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Livramento condicional'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Progressões'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '13',
            'translate' => [
                'pt-br' => 'Indulto'
            ],
            'type' => 'text',
        ],
        //END page 13

        //BEGIN page 14
        [
            'name' => '1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Há oficinas de trabalho?'
            ],
            'type' => 'boolean',
            // Quantidade
        ],
        [
            'name' => '1_1',
            'depends_on' => [
                'field' => '14_1',
                'value' => null
            ],
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantas das oficinas são administradas pelo estabelecimento?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantas das oficinas são administradas em parceria com a iniciativa privada?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_1_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_1_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_1_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_2_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_2_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_2_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_3_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_3_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_3_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_4_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_4_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_4_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_5_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_5_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_5_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_6_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_6_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_6_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_7_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_7_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_7_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_8_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_8_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_8_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_9_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_9_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_9_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_10_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Outros'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_11_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_11_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_11_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_12_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_12_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_12_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_13_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_13_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_13_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_14_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_14_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_14_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_15_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_15_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_15_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_16_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_16_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_16_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_17_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_17_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_17_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_18_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_18_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_18_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_19_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Quantidade'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_19_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_19_3',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Não remunerados'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_20_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Outros'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_21_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_21_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_22_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_22_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_23_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_23_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_24_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_24_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_25_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_25_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_26_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_26_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_27_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_27_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_28_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_28_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_29_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_29_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_30_1',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Mulher'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_30_2',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Homem'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Total de presos ou internos com permissão para trabalho externo'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Há avaliação das aptidões e capacidades do preso para sua alocação em determinado trabalho?'
            ],
            'type' => 'boolean',
            // Em caso positivo, como essa avaliação é realizada?
        ],
        [
            'name' => '6_1',
            'depends_on' => [
                'field' => '14_6',
                'value' => null
            ],
            'page' => '14',
            'translate' => [
                'pt-br' => 'Como essa avaliação é realizada?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '14',
            'translate' => [
                'pt-br' => 'Há avaliação e estímulo ao crescimento profissional que permita a qualificação ou diversificação do trabalho?'
            ],
            'type' => 'boolean',
            // Em caso positivo, descreva
        ],
        [
            'name' => '7_1',
            'depends_on' => [
                'field' => '14_7',
                'value' => null
            ],
            'page' => '14',
            'translate' => [
                'pt-br' => 'Descreva'
            ],
            'type' => 'text',
        ],
        //END page 14

        //BEGIN page 15
        [
            'name' => '1_1_1',
            'page' => '15',
            'translate' => [
                'pt-br' => 'P'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'CP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COL'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_1_5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_1',
            'page' => '15',
            'translate' => [
                'pt-br' => 'P'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'CP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COL'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_2_5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_1',
            'page' => '15',
            'translate' => [
                'pt-br' => 'P'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'CP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COL'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_3_5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_1',
            'page' => '15',
            'translate' => [
                'pt-br' => 'P'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'CP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COL'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_4_5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_1',
            'page' => '15',
            'translate' => [
                'pt-br' => 'P'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'CP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COL'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_5_5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_1',
            'page' => '15',
            'translate' => [
                'pt-br' => 'P'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'CP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COL'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'COC'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],
        [
            'name' => '1_6_5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'HCTP'
            ],
            'type' => 'select',
            'options' => [
                'Ausência',
                'Inconforme',
                'Conforme',
            ]
        ],

        [
            'name' => '2_1',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Alfabetização'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_2',
            'page' => '15',
            'translate' => [
                'pt-br' => 'ensino fundamental'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'ensino médio'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'profissionalizante'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'outros'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2_5_1',
            'page' => '15',
            'depends_on' => [
                'field' => '15_2_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Especificar'
            ],
            'type' => 'text',
        ],
        [
            'name' => '3',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Os cursos são ministrados por'
            ],
            'type' => 'select',
            'options' => [
                'Professores do Sistema Penitenciário Estadual',
                'Professores da Secretaria Estadual de Educação',
                'Professores da Secretaria Municipal de Educação',
                'Presos monitores',
                'Voluntários',
                'other' => 'Outros professores', // Especificar
            ]
        ],
        [
            'name' => '4',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Há atividades esportivas?'
            ],
            'type' => 'boolean',
            // Quais / Onde
        ],
        [
            'name' => '4_1',
            'page' => '15',
            'depends_on' => [
                'field' => '15_4',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quais?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4_2',
            'page' => '15',
            'depends_on' => [
                'field' => '15_4',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Onde?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Há atividades culturais/lazer?'
            ],
            'type' => 'boolean',
            // Quais / Onde
        ],
        [
            'name' => '5_1',
            'page' => '15',
            'depends_on' => [
                'field' => '15_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quando?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '5_2',
            'page' => '15',
            'depends_on' => [
                'field' => '15_5',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Onde?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '15',
            'translate' => [
                'pt-br' => 'Se há biblioteca, como funciona o acesso das pessoas presas aos livros'
            ],
            'type' => 'text',
        ],
        //END page 15

        //BEGIN page 16
        [
            'name' => '1',
            'page' => '16',
            'translate' => [
                'pt-br' => 'Há visita de religiosos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '16',
            'translate' => [
                'pt-br' => 'Quais denominações visitam o estabelecimento?'
            ],
            'type' => 'select',
            'options' => [
                'Espíritas',
                'Católicos',
                'Evangélicos',
                'de Matriz Africana',
                'other' => 'Outra',
            ]
        ],
        [
            'name' => '3',
            'page' => '16',
            'translate' => [
                'pt-br' => 'Onde são realizadas as cerimônias religiosas?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '16',
            'translate' => [
                'pt-br' => 'É permitida a entrada de objetos que fazem parte da cerimônia?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '16',
            'translate' => [
                'pt-br' => 'As necessidades religiosas são consideradas com relação às vestimentas, horários e rotinas?'
            ],
            'type' => 'boolean',
        ],
        //END page 16

        //BEGIN page 17
        [
            'name' => '1',
            'page' => '17',
            'translate' => [
                'pt-br' => 'Há recintos adequados para a atividade de assistência social?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '17',
            'translate' => [
                'pt-br' => 'Contato com familiares'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '3',
            'page' => '17',
            'translate' => [
                'pt-br' => 'Documentos'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '4',
            'page' => '17',
            'translate' => [
                'pt-br' => 'Benefícios da Previdência Social'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '17',
            'translate' => [
                'pt-br' => 'Ações com os egressos'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '17',
            'translate' => [
                'pt-br' => 'Ações com o SUAS'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7',
            'page' => '17',
            'translate' => [
                'pt-br' => 'Projetos'
            ],
            'type' => 'boolean',
            //Quais
        ],
        [
            'name' => '7_1',
            'page' => '17',
            'depend_on' => [
                'field' => '17_7',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Quais?'
            ],
            'type' => 'text',
        ],
        //END page 17

        //BEGIN page 18
        [
            'name' => '1',
            'page' => '18',
            'translate' => [
                'pt-br' => 'A segurança interna é realizada por'
            ],
            'type' => 'select',
            'options' => [
                'Agentes penitenciários',
                'Policiais civis',
                'Policiais militares',
                'Terceirizados',
                'other' => 'Outros',
            ]
        ],
        [
            'name' => '2_1',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Arma menos letal (bala de borracha)'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_2',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Arma letal'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_3',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Taser'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_4',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Gás de pimenta / lacrimogênio'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_5',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Cacetete / Tonfa'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_6',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Algemas'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_7',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Rádio'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_8',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Alarme'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_9',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Circuito de vigilância interna'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2_10',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Outro'
            ],
            'type' => 'select',
            'options' => [
                'other' => 'Sim',
                'Não'
            ]
        ],
        [
            'name' => '3_1',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Os usuários têm porte de armas?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica',
            ]
        ],
        [
            'name' => '3_2',
            'page' => '18',
            'translate' => [
                'pt-br' => 'É garantido treinamento periódico?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica',
            ]
        ],
        [
            'name' => '4',
            'page' => '18',
            'translate' => [
                'pt-br' => 'No caso de emprego de arma de fogo, é feito registro?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica',
            ]
        ],
        [
            'name' => '5',
            'page' => '18',
            'translate' => [
                'pt-br' => 'No caso de uso de arma tipo Taser os registros de descarga do equipamento são identificados por servidor?'
            ],
            'type' => 'select',
            'options' => [
                'Sim',
                'Não',
                'Não se aplica',
            ]
        ],
        [
            'name' => '6',
            'page' => '18',
            'translate' => [
                'pt-br' => 'A segurança externa é realizada por'
            ],
            'type' => 'select',
            'options' => [
                'policiais civis',
                'policiais militares',
                'agentes penitenciários',
                'terceiros',
                'other' => 'outros',
            ]
        ],
        [
            'name' => '7',
            'page' => '18',
            'translate' => [
                'pt-br' => 'A escolta externa é realizada por'
            ],
            'type' => 'select',
            'options' => [
                'policiais civis',
                'policiais militares',
                'agentes penitenciários',
                'terceiros',
                'other' => 'outros',
            ]
        ],
        [
            'name' => '8',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Há escolta externa especifica para área de saúde'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '9',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Existe grupo de intervenção especial vinculado à unidade?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '18',
            'depends_on' => [
                'field' => '18_9',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Caso exista, quem são os envolvidos'
            ],
            'type' => 'select',
            'options' => [
                'policiais civis',
                'policiais militares',
                'agentes penitenciários',
                'terceiros',
                'other' => 'outros',
            ]
        ],
        [
            'name' => '11_1',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Portal detector de metal'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11_2',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Raquete detectora de metal'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11_3',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Banco detector de metal'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11_4',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Raio X'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11_5',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Espectômetro'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11_6',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Body Scanner'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '11_7',
            'page' => '18',
            'translate' => [
                'pt-br' => 'Outro'
            ],
            'type' => 'select',
            'options' => [
                'other' => 'Sim',
                'Não'
            ]
        ],
        //END page 18

        //BEGIN page 19
        [
            'name' => '1',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Há registro de imposição de sanção disciplinar aos presos?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Qual a forma adotada para o registro?'
            ],
            'type' => 'select',
            'options' => [
                'Livro',
                'PAD',
                'Procedimento Eletrônico',
                'other' => 'Outro',
            ]
        ],
        [
            'name' => '3',
            'page' => '19',
            'translate' => [
                'pt-br' => 'No registro da sanção de natureza grave é anotado o prévio procedimento disciplinar?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '4',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Há sanção disciplinar de natureza grave sem instauração do respectivo procedimento?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Toda notícia de falta disciplinar enseja a instauração de procedimento?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '19',
            'translate' => [
                'pt-br' => 'A falta disciplinar é reconhecida judicialmente?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7',
            'page' => '19',
            'translate' => [
                'pt-br' => 'São executadas sanções coletivas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '19',
            'translate' => [
                'pt-br' => 'É observado o direito de defesa do preso?'
            ],
            'type' => 'boolean',
            //Se sim, em qual fase?  fase administrativa  fase judicial
        ],
        [
            'name' => '8_1',
            'page' => '19',
            'depends_on' => [
                'field' => '19_8',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'em qual fase?'
            ],
            'options' => [
                'fase administrativa',
                'fase judicial',
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '9',
            'page' => '19',
            'translate' => [
                'pt-br' => 'O ato administrativo que determina a aplicação da sanção disciplinar é motivado?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Quais as condições da cela usada para aplicação de sanção disciplinar?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '11',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Qual o maior período aplicado de isolamento?'
            ],
            'type' => 'select',
            'options' => [
                '10 dias',
                '20 dias',
                '30 dias',
                'other' => 'Outro',
            ]
        ],
        [
            'name' => '12',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Qual o tempo médio de rebaixamento de comportamento ou reabilitação por falta grave?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '13',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Qual o número de sanções por falta grave (mês)?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '14',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Houve motins ou rebeliões nos últimos 12 meses?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '15_1_1',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Fugas (pessoas)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_2',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Pessoas evadidas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_3',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Saídas temporárias (pessoas)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_4',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes naturais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_5',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes por homicídio'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_6',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes acidentais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_7',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes por suicídio'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_8',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes por causas desconhecidas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_1_9',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Incidentes com funcionários (pessoas)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_1',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Fugas (pessoas)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_2',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Pessoas evadidas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_3',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Saídas temporárias (pessoas)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_4',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes naturais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_5',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes por homicídio'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_6',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes acidentais'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_7',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes por suicídio'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_8',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Mortes por causas desconhecidas'
            ],
            'type' => 'text',
        ],
        [
            'name' => '15_2_9',
            'page' => '19',
            'translate' => [
                'pt-br' => 'Incidentes com funcionários (pessoas)'
            ],
            'type' => 'text',
        ],
        //END page 19

        //BEGIN page 20
        [
            'name' => '1',
            'page' => '20',
            'translate' => [
                'pt-br' => 'A visita social ocorre regularmente?'
            ],
            'type' => 'boolean',
            // frequencia
        ],
        [
            'name' => '1_1',
            'page' => '20',
            'depends_on' => [
                'field' => '20_1',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Quantas pessoas podem ser cadastradas por preso para realizarem a visita?'
            ],
            'type' => 'select',
            'options' => [
                '1 ou 2',
                '3 ou 4',
                '5 ou 6',
                '7 ou 8',
                '9 ou mais',
            ]
        ],
        [
            'name' => '3',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Quantas pessoas podem realizar a visita por vez?'
            ],
            'type' => 'select',
            'options' => [
                '1 ou 2',
                '3 ou 4',
                '5 ou 6',
                '7 ou 8',
                '9 ou mais',
            ]
        ],
        [
            'name' => '4',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Qual o local que ocorre a visita social'
            ],
            'type' => 'multicheckbox',
            'options' => [
                'Pátio de visita',
                'Pátio do banho de sol',
                'Celas',
                'Outro',
            ]
        ],
        [
            'name' => '4_1',
            'page' => '20',
            'depends_on' => [
                'field' => '20_4',
                'value' => 3
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Há local específico para visita de crianças?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '6',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Há permissão para visitas íntimas?'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '6_1',
            'page' => '20',
            'depends_on' => [
                'field' => '20_6',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '7',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Há permissão para visitas íntimas homoafetivas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Qual o local que ocorre a visita íntima?'
            ],
            'type' => 'multicheckbox',
            'options' => [
                'Módulo de visita íntima',
                'Celas',
                'Outro',
            ]
        ],
        [
            'name' => '8_1',
            'page' => '20',
            'depends_on' => [
                'field' => '20_8',
                'value' => 2
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '20',
            'translate' => [
                'pt-br' => 'Quais os procedimentos de revista dos visitantes?'
            ],
            'type' => 'select',
            'options' => [
                'Mecânica(detector de metais, raquetes, banco, espectômetro)',
                'Manual sem desnudamento',
                'Com desnudamento',
                'Outro',
            ]
        ],
        [
            'name' => '9_1',
            'page' => '20',
            'depends_on' => [
                'field' => '20_9',
                'value' => 3
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '10',
            'page' => '20',
            'translate' => [
                'pt-br' => 'É permitida a visita de menores de 18 anos?'
            ],
            'type' => 'boolean',
        ],
        //END page 20

        //BEGIN page 21
        [
            'name' => '1',
            'page' => '21',
            'translate' => [
                'pt-br' => 'Há reclamações sobre quais aspectos'
            ],
            'type' => 'select',
            'options' => [
                'Instalações',
                'Assistência Jurídica',
                'Assistência Saúde',
                'Assistência Educacional',
                'Assistência social',
                'Atividades Esportivas',
                'Lazer',
                'Visita',
                'Maus tratos ou tortura',
                'Outros',
            ]
        ],
        [
            'name' => '1_1',
            'page' => '21',
            'depends_on' => [
                'field' => '21_1',
                'value' => 9
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '2',
            'page' => '21',
            'depends_on' => [
                'field' => '21_1',
                'value' => 8
            ],
            'translate' => [
                'pt-br' => 'No caso de maus tratos ou tortura, há indícios dos fatos relatados?'
            ],
            'type' => 'boolean',
            /**
             *  Ferimentos no corpo
             *  Marcas de projéteis nas celas ou outros ambientes
             *  Relatos idênticos em diferentes alas
             *  Nas datas dos eventos houve cancelamento de visita, entrada de grupos especiais de intervenção, transferência de presos, movimentações noturnas ou outra situação atípica
             *  Locais característicos como ambiente de castigo (sem colchão, sem sanitário, sem iluminação, sem ventilação, sujos, com insetos, entre outros aspectos)
             *  Uso de bala clava (capuz)
             *  Outros:  -->
             */
        ],
        [
            'name' => '2_1',
            'page' => '21',
            'depends_on' => [
                'field' => '21_2',
                'value' => null
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'select',
            'options' => [
                'Ferimentos no corpo',
                'Marcas de projéteis nas celas ou outros ambientes',
                'Relatos idênticos em diferentes alas',
                'Nas datas dos eventos houve cancelamento de visita, entrada de grupos especiais de intervenção, transferência de presos, movimentações noturnas ou outra situação atípica',
                'Locais característicos como ambiente de castigo (sem colchão, sem sanitário, sem iluminação, sem ventilação, sujos, com insetos, entre outros aspectos)',
                'Uso de bala clava (capuz)',
                'other' => 'Outros',
            ]
        ],
        [
            'name' => '3',
            'page' => '21',
            'translate' => [
                'pt-br' => 'Quais providências foram tomadas para apurar os fatos até o momento?'
            ],
            'depends_on' => [
                'field' => '21_1',
                'value' => 8
            ],
            'type' => 'multicheckbox',
            'options' => [
                'Exame de corpo de delito',
                'Denúncia formalizada ao Juiz ou Ministério Público',
                'Inquérito',
                'Instauração de procedimento administrativo',
                'Outro',
            ]
        ],
        [
            'name' => '3_1',
            'page' => '21',
            'depends_on' => [
                'field' => '21_3',
                'value' => 4
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '21',
            'translate' => [
                'pt-br' => 'Quais providências serão tomadas para apurar os fatos a partir de agora?'
            ],
            'depends_on' => [
                'field' => '21_1',
                'value' => 8
            ],
            'type' => 'multicheckbox',
            'options' => [
                'Exame de corpo de delito',
                'Denúncia formalizada ao Juiz ou Ministério Público',
                'Inquérito',
                'Instauração de procedimento administrativo',
                'Outro',
            ]
        ],
        [
            'name' => '4_1',
            'page' => '21',
            'depends_on' => [
                'field' => '21_4',
                'value' => 4
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '5',
            'page' => '21',
            'translate' => [
                'pt-br' => 'Há orientação no estabelecimento quanto à forma de acessar (assinalar as opções em que houver orientação)'
            ],
            'type' => 'select',
            'options' => [
                'Ouvidoria',
                'Corregedoria',
                'Conselho da Comunidade',
                'Conselho Penitenciário',
                'Comissão de DH da OAB',
                'Disque 100',
                'other' => 'Outro',
            ]
        ],
        [
            'name' => '6',
            'page' => '21',
            'translate' => [
                'pt-br' => 'Outras informações'
            ],
            'type' => 'text',
        ],
        //END page 21

        //BEGIN page 22
        [
            'name' => '1',
            'page' => '22',
            'translate' => [
                'pt-br' => 'No momento da inclusão da pessoa presa, há explicações sobre o funcionamento do estabelecimento?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '2',
            'page' => '22',
            'translate' => [
                'pt-br' => 'No momento da inclusão da pessoa presa, há explicações sobre direitos e deveres do preso?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '3',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Quando se aproxima a liberdade há algum trabalho realizado para preparação do preso?'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '3_1',
            'page' => '22',
            'depends_on' => [
                'field' => '22_3',
                'value' => null
            ],
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'type' => 'text',
        ],
        [
            'name' => '4',
            'page' => '22',
            'translate' => [
                'pt-br' => 'É permitida a entrada de jornais e revistas?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '5',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Como funciona o envio e recebimento de correspondências?'
            ],
            'type' => 'text',
        ],
        [
            'name' => '6',
            'page' => '22',
            'translate' => [
                'pt-br' => 'As pessoas presas têm acesso a telefone público?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '7',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Há alistamento, transferência e revisão eleitoral de presos provisórios?'
            ],
            'type' => 'boolean',
            //           <!-- motivo -->
        ],
        [
            'name' => '7_1',
            'page' => '22',
            'depends_on' => [
                'field' => '22_7',
                'value' => false
            ],
            'translate' => [
                'pt-br' => 'Motivo'
            ],
            'type' => 'text',
        ],
        [
            'name' => '8_1',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Rádio/Aparelho de Som'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8_2',
            'page' => '22',
            'translate' => [
                'pt-br' => 'TV'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8_3',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Vídeo/DVD'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8_4',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Geladeira'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8_5',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Fogão/Fogareiro/Mergulhão/Rabo Quente'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '8_6',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Outros'
            ],
            'type' => 'text',
        ],
        [
            'name' => '9',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Há organizações não governamentais atuando no estabelecimento?'
            ],
            'type' => 'boolean',
        ],
        [
            'name' => '10_1',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Quais áreas'
            ],
            'depends_on' => [
                'field' => '22_9',
                'value' => null
            ],
            'type' => 'multicheckbox',
            'options' => [
                'gestão',
                'educação',
                'saúde',
                'assistência social',
                'trabalho',
                'religiosa',
                'comunicação',
                'cidadania',
                'reciclagem',
                'manutenção',
                'outras',
            ]
        ],
        [
            'name' => '10_1_1',
            'page' => '22',
            'depends_on' => [
                'field' => '22_10_1',
                'value' => 10
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '10_2',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Qual a frequência'
            ],
            'depends_on' => [
                'field' => '22_9',
                'value' => null
            ],
            'type' => 'multicheckbox',
            'options' => [
                'diária',
                'semanal',
                'quinzenal',
                'mensal',
                'esporádico',
                'outro',
            ]
        ],
        [
            'name' => '10_2_1',
            'page' => '22',
            'depends_on' => [
                'field' => '22_10_2',
                'value' => 5
            ],
            'translate' => [
                'pt-br' => ''
            ],
            'type' => 'text',
        ],
        [
            'name' => '11',
            'page' => '22',
            'translate' => [
                'pt-br' => 'Como é tratado o lixo produzido no estabelecimento?'
            ],
            'type' => 'select',
            'options' => [
                'separado',
                'reciclado',
                'não é recolhido',
                'coleta municipal',
                'outro',
            ]
        ],
        [
            'name' => '11_1',
            'page' => '22',
            'translate' => [
                'pt-br' => ''
            ],
            'depends_on' => [
                'field' => '22_11',
                'value' => 4
            ],
            'type' => 'text',
        ],
        //END page 22

        //BEGIN page 23
        [
            'name' => '1_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Juiz Corregedor'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_1_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_1',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_2',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Juiz de Execução'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_2_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_2',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_3',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Ministério Público'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_3_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_3',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_4',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Defensor Público'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_4_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_4',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_5',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Conselho Penitenciário'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_5_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_5',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_6',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Conselho da Comunidade'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_6_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_6',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_7',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Conselho Estadual de Direitos Humanos ou Comitê Estadual de Combate à Tortura'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_7_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_7',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_8',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Comissão de Direitos Humanos da OAB'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_8_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_8',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_9',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Pastoral Carcerária'
            ],
            'type' => 'boolean',
            //Frequencia
        ],
        [
            'name' => '1_9_1',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Frequência'
            ],
            'depends_on' => [
                'field' => '23_1_9',
                'value' => null
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_10',
            'page' => '23',
            'translate' => [
                'pt-br' => 'Outros'
            ],
            'type' => 'text',
        ],
        //END page 23

        //BEGIN page 24
        [
            'name' => '1_1',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Estrutura predial'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_2',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Manutenção'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_3',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Limpeza'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_4',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Ventilação das celas'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_5',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Iluminação das celas'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_6',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Insolação das celas'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_7',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Cozinha'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_8',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Refeitório'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_9',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Assistência à saúde'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_10',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Assistência à educação'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_11',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Assistência jurídica'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_12',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Assistência social'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_13',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Atividades laborais'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_14',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Cela para isolamento/seguro'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_15',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Cela de sanção disciplinar'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_16',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Local de visita social'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_17',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Local de visita íntima'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_18',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Pátio de sol'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_19',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Alojamento dos agentes'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_20',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Segurança'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        [
            'name' => '1_21',
            'page' => '24',
            'translate' => [
                'pt-br' => 'Procedimentos da unidade'
            ],
            'type' => 'select',
            'options' => [
                'Ótimo: 10 - 9',
                'Bom: 8 - 7',
                'Regular: 6 - 4',
                'Ruim: 3 - 0',
                'Não avaliado',
            ]
        ],
        //END page 24

        //BEGIN page 25
        [
            'name' => '1_1',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ocupação total superior à capacidade da unidade (art. 85 da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_2',
            'page' => '25',
            'translate' => [
                'pt-br' => 'N.º de presos por cela superior ao n.º definido em lei (art. 88 da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_3',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Presença de pessoas com idade acima de 60 anos junto aos demais presos (art. 82, § 1º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_4',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Irregularidade na distribuição dos presos nas celas, com presença de presos provisórios junto a presos condenados e presos primários com reincidentes (art. 84, § 1º da LEP, art. 7º da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_5',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Falta de programa individualizador da pena privativa de liberdade (art. 6º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_6',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Existência de pessoas presas por medida de segurança cumprindo pena junto aos demais presos (anexo da Resolução nº 05/2004 do CNPCP, e art. 4º, Resolução nº 12/2009 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_7',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Presença de adolescentes no estabelecimento (arts. 123 e 185 do ECA);'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_8',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Presença de mulheres em ambientes de homens (art. 82, § 1º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_9',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Presença de agentes do sexo masculino nas dependências internas dos estabelecimentos penais femininos (art. 83 § 3º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_10',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de berçário para crianças nas unidades prisionais femininas (art. 83 § 2º da LEP, e art. 10, Resolução nº 4/2009 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_11',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência de seção para gestante e parturiente nos estabelecimentos penais femininos (art. 89 da LEP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_12',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência de creche para abrigar crianças entre 06 meses e 7 anos nos estabelecimentos penais femininos (art. 89 da LEP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_13',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência ou número insuficiente de camas individuais (art. 8º, § 2º da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_14',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Condições precárias de higiene e limpeza das celas (art. 9º da Resolução n.º 14/94 CNPCP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_15',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Falta de cardápio alimentar orientado por nutricionistas (art. 13 da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_16',
            'page' => '25',
            'translate' => [
                'pt-br' => 'N.º de refeições por dia inadequado às necessidades dos presos (art. 13 da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_17',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Roupas fornecidas pelo estabelecimento impróprias às condições climáticas (art. 12, caput, da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_18',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Roupas sujas e/ou em mau estado de conservação (art. 12, § 2º da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_19',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de local para aquisição de produtos permitidos para higiene pessoal, mas não fornecidos pela administração (art. 13 da LEP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_20',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de sanitário na própria cela (art. 88, caput, da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_21',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Falta de assistência jurídica regular aos presos carentes (arts. 15, 16 e 41, VII da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_22',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência de instalação destinada à Defensoria Pública (art. 83 § 5º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_23',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de local destinado a atividades de estágio para universitários (art. 83, § 1º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_24',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de curso de alfabetização (art. 40, p. un. da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_25',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de educação de ensino fundamental (art. 18 da LEP, meta 17 da Lei 10.172/2001)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_26',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de educação de ensino profissional (art. 19 da LEP, meta 17 da Lei 10.172/2001)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_27',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência de biblioteca (art. 21 da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_28',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Não oferecimento de atividade física e/ou recreação (art. 23, IV e art. 41, V e VI da LEP, art. 14 da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_29',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência de sala de aula para cursos básico e profissionalizante (art. 83 § 4º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_30',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Falta de serviço de assistência social (arts. 22 e 41, VII da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_31',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de cursos de qualificação para o servidor penitenciário (art. 77, § 1º da LEP e art. 49 da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_32',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência de equipe de saúde própria nas unidades com mais de 100 presos (art. 8º da Portaria Interministerial - Saúde e Justiça - n.º 1.777, de 09/09/2003)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_33',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Não disponibilização dos medicamentos básicos do SUS (art. 8º, § 4º da Portaria Interministerial - Saúde e Justiça - n.º 1.777/2003)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_34',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Nº de agentes penitenciários inferior ao recomendado: 5 presos por agente penitenciário, no mínimo (art. 1º, Resolução nº 09/2009 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_35',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Ausência de profissionais da equipe técnica ou nº insuficiente abaixo do recomendado (art. 2º, Resolução nº 09/2009 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_36',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de audiência especial com o diretor do estabelecimento (art. 41, XIII da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_37',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Falta de concessão de banho de sol regular aos presos (art. 14 da Resolução n.º 14/94 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_38',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Proibição da utilização dos meios de informação (art. 41, XV da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_39',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Proibição da utilização de correspondência escrita externa (art. 41, XV da LEP);'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_40',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Falta de tratamento nominal dos presos (art. 41, XI da LEP e art. 4º da Resolução n.º14/94 do CNPCP);'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_41',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de local específico para guarda de objetos pessoais dos presos (art. 45, §§ 1º e 2 da Resolução n.º 14/94 do CNPCP);'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_42',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Impedimento de visita íntima para relações homoafetivas (art. 2º, Resolução nº 04/2011 do CNPCP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_43',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Inexistência de Comissão Técnica de Classificação dos Condenados (art. 6º da LEP)'
            ],
            'type' => 'text',
        ],
        [
            'name' => '1_44',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Deficiência na composição da Comissão Técnica (art. 7º da LEP)'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_45',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Condições inadequadas de realização de trabalho:

Trabalho não remunerado (arts. 29 e 41, II da LEP);
Jornada reduzida ou ampliada (art. 33 da LEP);
Tipo de trabalho incompatível com a condição de idoso, doente ou pessoa com deficiência (art. 32, §§ 2º e 3º da LEP);
Inexistência de trabalho voltado para a reinserção social do condenado (art.23, V da LEP);'
            ],
            'type' => 'text',
        ],

        [
            'name' => '1_46',
            'page' => '25',
            'translate' => [
                'pt-br' => 'Indícios de ocorrência de atos tipificados como tortura (Lei 9.455/97)'
            ],
            'type' => 'text',
        ],




        //END page 25

    ];


    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Return field name
     * @param array $field
     * @return string
     */
    private static function getFieldName(array $field)
    {
        $name = '';

        if (array_key_exists('page', $field)) {
            $name .= $field['page'] . '_';
        }

        $name .= $field['name'];

        return $name;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $documentManager = $this->container->get('doctrine_mongodb.odm.document_manager');

        /** @var Form $form */
        $form = $this->getReference(LoadForm::NAME);

        $fieldPrefix = 'form-' . $form->getName();

        $fieldsDocuments = [];

        foreach (self::$fields as $field) {
            $formField = new FormField();

            $formField->setName(self::getFieldName($field));

            if (array_key_exists('options', $field)) {
                $formField->setOptions($field['options']);

                if (array_key_exists('other', $field['options'])) {
                    $formField->setFreeTextOption('other');
                }
            }

            if (array_key_exists('depends_on', $field)) {
                $dependsOn = $fieldsDocuments[$field['depends_on']['field']];
                $depends = new FormFieldDepends($dependsOn, $field['depends_on']['value']);
                $formField->addDependsOn($depends);
                unset($dependsOn);
                unset($depends);
            }

            $documentManager->persist($formField);
            $form->addField($formField);

            $fieldsDocuments[self::getFieldName($field)] = $formField;

            unset($formField);

            $translation = new Translation();
            $translation->setKey($fieldPrefix . '-field-' . self::getFieldName($field));
            /** @var Language $lang */
            $lang = $this->getReference(LoadLangs::$reference_prefix . 'pt-br');
            $translation->setLanguage($lang);
            $translation->setValue($field['translate']['pt-br']);
            $documentManager->persist($translation);

            unset($translation);
        }

        unset($fieldsDocuments);

        $documentManager->persist($form);
        $documentManager->flush();
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return 6;
    }
}