<?php

namespace Renatomefi\TranslateBundle\DataFixtures\MongoDB;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Renatomefi\TranslateBundle\Document\Translation;

/**
 * Class LoadTranslations
 * @package Renatomefi\TranslateBundle\DataFixtures\MongoDB
 * @codeCoverageIgnore
 */
class LoadTranslations extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * If you want a new Lang, look into LoadLangs references, or else it will crash!
     * @var array Translations to apply into languages
     */
    protected $_newTranslations = [
        // Title
        'index-title-sidebar-left' => 'Menu',
        'index-title-sidebar-right' => 'Admin',
        // Sidebar Left
        'sidebar-menu-languages' => [
            'en-us' => 'Choose a Lang',
            'pt-br' => 'Escolha uma Língua'],
        'sidebar-menu-form' => [
            'en-us' => 'Fill a Form',
            'pt-br' => 'Formulários'],
        // Page: Login
        'login-index' => 'Login',
        'login-form-legend' => [
            'en-us' => 'Enter a valid Symfony 2 User',
            'pt-br' => 'Utilize um usuário válido do Symfony 2'],
        'login-form-username' => 'Username',
        'login-form-password' => 'Password',
        'login-logout-force' => [
            'en-us' => 'Having trouble? Force your logout and clear your session',
            'pt-br' => 'Problemas? Limpe sua sessão e acessos'],
        // Page: Forms
        'form-start-title' => [
            'en-us' => 'Forms',
            'pt-br' => 'Formulários'],
        'form-start-choose' => [
            'en-us' => 'Form filling',
            'pt-br' => 'Preenchimento de formulários'],
        'form-select-default' => [
            'en-us' => 'Choose a form',
            'pt-br' => 'Escolha um formulário'],
        'form-no-forms' => [
            'en-us' => 'No forms found',
            'pt-br' => 'Nenhum formulário disponível'],
        'form-filling-page-index' => [
            'en-us' => 'Index',
            'pt-br' => 'Índice'],
        'form-filling-page-users' => [
            'en-us' => 'Users',
            'pt-br' => 'Usuários'],
        'form-filling-page-comments' => [
            'en-us' => 'Obs',
            'pt-br' => 'Comentários'],
        'form-filling-page-conclusion' => [
            'en-us' => 'Conclusion',
            'pt-br' => 'Conclusão'],
        'form-filling-page-upload' => [
            'en-us' => 'Files',
            'pt-br' => 'Arquivos'],
        'form-filling-page-files' => [
            'en-us' => 'Files',
            'pt-br' => 'Anexos'],
        'form-filling-page-form' => [
            'en-us' => 'Form',
            'pt-br' => 'Formulário'],
        'form-filling-index-pages-title' => [
            'en-us' => 'Pages Index',
            'pt-br' => 'Índice de Páginas'],
        // Form: Buttons 'form-filling-btn-save'
        'form-filling-btn-save' => [
            'en-us' => 'Save',
            'pt-br' => 'Salvar'],
        'form-filling-btn-readonly' => [
            'en-us' => 'Read Only mode',
            'pt-br' => 'Modo leitura'],
        'form-filling-btn-publish' => [
            'en-us' => 'Publish',
            'pt-br' => 'Publicar'],
        // Form: demo
        'sammui-form-demo' => [
            'en-us' => 'Demo Form',
            'pt-br' => 'Formulário de demonstração'],
        'form-sammui-form-demo-field-name' => [
            'en-us' => 'Complete Name',
            'pt-br' => 'Nome Completo'],
        'form-sammui-form-demo-field-email' => [
            'en-us' => 'Email',
            'pt-br' => 'Email'],
        'form-sammui-form-demo-field-gender' => [
            'en-us' => 'Gender',
            'pt-br' => 'Sexo'],
        'form-sammui-form-demo-field-above_21' => [
            'en-us' => 'Above 21 yo',
            'pt-br' => 'Mais de 21 anos'],
        'form-sammui-form-demo-field-should_open_next' => [
            'en-us' => 'Should open next field?',
            'pt-br' => 'Devo abrir o próximo campo?'],
        'form-sammui-form-demo-field-next' => [
            'en-us' => 'I\'m next field',
            'pt-br' => 'Eu sou o próximo campo'],
        'form-sammui-form-demo-field-operational_system' => [
            'en-us' => 'O.S. Sample with options (numeric keys)',
            'pt-br' => 'S.O. Exemplo com opções (chaves numéricas)'],
        'form-sammui-form-demo-field-operational_system_map' => [
            'en-us' => 'O.S. Sample with options (hash keys)',
            'pt-br' => 'S.O. Exemplo com opções (chaves com hash)'],
        'form-sammui-form-demo-field-windows_field' => [
            'en-us' => 'Are you Crazy?',
            'pt-br' => 'Você é louco?'],
        'form-sammui-form-demo-field-crazy_confirmation' => [
            'en-us' => 'Are you sure?',
            'pt-br' => 'Você tem certeza?'],
        'form-sammui-form-demo-field-sammui_uses' => [
            'en-us' => 'What technologies does sammui uses?',
            'pt-br' => 'Quais tecnologias o sammui usa?'],
        'form-sammui-form-demo-group-group_1' => [
            'en-us' => 'Group 1 of pages',
            'pt-br' => 'Grupo de páginas 1'],
        'form-sammui-form-demo-group-group_2' => [
            'en-us' => 'Group 2 of pages',
            'pt-br' => 'Grupo de páginas 2'],
        // Form: human readable Field Values
        'form-value-null' => [
            'en-us' => 'NULL Value',
            'pt-br' => 'Valor nulo'],
        'form-value-true' => [
            'en-us' => 'True',
            'pt-br' => 'Verdadeiro'],
        'form-value-false' => [
            'en-us' => 'False',
            'pt-br' => 'Falso'],
        // Form: Modals and infos
        'form-protocol-publish-success' => [
            'en-us' => 'Procolo published successfully, you\'ll not be able to open it again',
            'pt-br' => 'Protocolo publicado com sucesso, você não poderá mais acessa-lo'],
        'form-protocol-created_at' => [
            'en-us' => 'Protocol started at',
            'pt-br' => 'Preenchimento iniciado em'],
        'form-protocol-first_save_date' => [
            'en-us' => 'First save date',
            'pt-br' => 'Primeiro salvamento em'],
        'form-protocol-last_save_date' => [
            'en-us' => 'Last save at',
            'pt-br' => 'Última vez salvo em'],
        'form-protocol-published-true' => [
            'en-us' => 'Published',
            'pt-br' => 'Publicado'],
        'form-protocol-published-false' => [
            'en-us' => 'Not Published',
            'pt-br' => 'Não Publicado'],
        'form-protocol-lock' => [
            'en-us' => 'Lock/Publish',
            'pt-br' => 'Bloquear/Publicar'],
        'form-protocol-unlock' => [
            'en-us' => 'Unlock/Un-publish',
            'pt-br' => 'Desbloquar/Despublicar'],
        'form-protocol-field_values' => [
            'en-us' => 'Saved fields',
            'pt-br' => 'Campos salvos'],
        'form-filling-page-non_users' => [
            'en-us' => 'Non registered users',
            'pt-br' => 'Usuários não registrados'],
        // Protocol publish
        //'form-protocol-publish-item-a'
        'form-protocol-publish-item-b' => [
            'en-us' => 'I revised all fields',
            'pt-br' => 'Eu revisei todos os campos'],
        'form-protocol-publish-item-a' => [
            'en-us' => 'I saved all fields',
            'pt-br' => 'Eu salvei todos os campos'],
        'form-protocol-publish-item-c' => [
            'en-us' => 'I known that I\'ll not have access to this protocol anymore',
            'pt-br' => 'Eu aceito que não terei mais acesso de leitura e edição deste protocolo'],
        'form-protocol-publish-item-d' => [
            'en-us' => 'I\'m sure of all above',
            'pt-br' => 'Tenho certeza de todos os itens acima'],
    ];

    /**
     * @param $key
     * @param $value
     * @param $reference
     * @return Translation
     */
    protected function createTranslateObj($key, $value, $reference)
    {
        $translation = new Translation();

        $translation->setLanguage($reference);
        $translation->setKey($key);
        $translation->setValue($value);

        return $translation;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        foreach ($this->_newTranslations as $k => $v) {
            foreach (LoadLangs::$default_langs as $lang) {
                $manager->persist(
                    $this->createTranslateObj(
                        $k,
                        (is_array($v) ? $v[$lang] : $v),
                        $this->getReference(LoadLangs::$reference_prefix . $lang)
                    )
                );
            }
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }

}