<?php

class ListController extends AbstractController {

    public function index(): void {
        if ($this->isConnected()) {
            $this->loadModel('list');
            $archives = ListModel::readArchive($_SESSION['mail']);
            $this->render('index', compact('archives'));
        } else {
            header("Location: /historia/user/connect?lang={$GLOBALS['i18n']}");
        }
    }

    public function add(): void {
        if ($this->isConnected()) {
            if (!empty($_POST)) {
                $this->checkPost();
                if (preg_match('/^[A-Z0-9_]+$/', $_POST['reference'])) {
                    $this->loadModel('list');
                    if (ListModel::addArchive($_SESSION['mail'], $_POST['reference'])) {
                        header("Location: /historia/list/index?lang={$GLOBALS['i18n']}");
                    } else {
                        echo 'Impossible d\'ajouter l\'archive, vous la possédez déjà';
                    }
                } else {
                    echo 'Seuls les caractères numériques, les lettres majuscules et les underscore sont autorisés pour les références d\'archives';
                }
            } else {
                http_response_code(400);
            }
        } else {
            header("Location: /historia/user/connect?lang={$GLOBALS['i18n']}");
        }
    }

    public function delete(string $reference): void {
        if ($this->isConnected()) {
            $this->loadModel('list');
            if (ListModel::deleteArchive($_SESSION['mail'], $reference)) {
                header("Location: /historia/list/index?lang={$GLOBALS['i18n']}");
            } else {
                echo 'Vous ne pouvez pas supprimer cette archive puisque vous ne la possédez pas';
            }
        } else {
            header("Location: /historia/user/connect?lang={$GLOBALS['i18n']}");
        }
    }

}
