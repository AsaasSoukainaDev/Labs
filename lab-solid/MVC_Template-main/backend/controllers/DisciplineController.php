<?php

require_once dirname(__DIR__) . '/services/DisciplineService.php';

/** Adaptateur HTTP : lit la requête et transforme les résultats en JSON. */
class DisciplineController
{
    public function __construct(private DisciplineService $service)
    {
    }

    public function handleRequest(): void
    {
        header('Content-Type: application/json; charset=utf-8');

        try {
            $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

            if ($method === 'GET') {
                $this->respond(200, $this->service->listerDisciplines());
                return;
            }

            if ($method === 'POST') {
                $input = json_decode(file_get_contents('php://input'), true);
                if (!is_array($input)) {
                    throw new InvalidArgumentException('Le corps de la requête doit être un objet JSON valide.');
                }

                $this->respond(200, $this->service->ajouterDiscipline($input));
                return;
            }

            $this->respond(405, ['message' => 'Méthode non autorisée']);
        } catch (InvalidArgumentException $exception) {
            $this->respond(400, [
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        } catch (Throwable $exception) {
            error_log($exception->getMessage());
            $this->respond(500, [
                'success' => false,
                'message' => 'Une erreur interne est survenue.',
            ]);
        }
    }

    private function respond(int $status, array $body): void
    {
        http_response_code($status);
        echo json_encode($body, JSON_UNESCAPED_UNICODE);
    }
}
