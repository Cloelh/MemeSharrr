<?php

namespace App\Aware;

use App\Repository\CommentRepository;
use App\Repository\MemeRepository;
use PDO;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class AwareManager
{
    private Request $request;

    private ?PDO $databaseConnection = null;

    private ?Environment $templateEngine = null;

    private ?MemeRepository $memeRepository = null;

    private ?CommentRepository $commentRepository = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function injectDependencies(object $object)
    {
        // On va "injecter" toutes les dépendances que "$object" a besoin
        // On va être vigilant à tous les besoins/dépendances de "$object"

        if ($object instanceof DatabaseConnectionAware) {
            if (!$this->databaseConnection) {
                $this->databaseConnection = new PDO('mysql:dbname=MemeSharrr;host=localhost;charset=utf8', 'root', 'root');
            }

            $object->provideDatabaseConnection($this->databaseConnection);
        }

        if ($object instanceof RequestAware) {
            $object->provideRequest($this->request);
        }

        if ($object instanceof TemplateEngineAware) {
            if (!$this->templateEngine) {
                $loader = new FilesystemLoader([__DIR__ . '/../Templates']);
                $this->templateEngine = new Environment($loader);
            }

            $object->provideTemplateEngine($this->templateEngine);
        }

        if ($object instanceof MemeRepositoryAware) {
            if (!$this->memeRepository) {
                $this->memeRepository = new MemeRepository();
                $this->injectDependencies($this->memeRepository);
            }

            $object->provideMemeRepository($this->memeRepository);
        }

        if ($object instanceof CommentRepositoryAware) {
            if (!$this->commentRepository) {
                $this->commentRepository = new CommentRepository();
                $this->injectDependencies($this->commentRepository);
            }

            $object->provideCommentRepository($this->commentRepository);
        }
    }
}
