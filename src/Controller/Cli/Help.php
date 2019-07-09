<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
declare(strict_types = 1);
namespace WetekChallenge\Controller\Cli;

final class Help extends BaseController
{
    /**
     * {@inheritdoc}
     *
     * @param string[] $aArgs {@inheritdoc}
     *
     * @return void
     */
    public function command(array $aArgs)
    {
        global $container;

        $this->writeln('
This is the help display of the Wetek Challenge Application.

General commands:
    help - Show this help menu
    import - Import EPX xml files from the default folder into MySQL and MongoDB databases
    import [folder] - Import EPX xml files from the chosen folder into MySQL and MongoDB databases. Unix style(Ex: ./some_folder)
    
    ps: Any specific configuration like database connections please refer to settings.php
');
    }
}
