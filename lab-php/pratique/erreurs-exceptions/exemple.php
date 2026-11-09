            <?php

            declare(strict_types=1);

            function publierArticle(string $titre): string
            {
                $titre = trim($titre);

                if ($titre === '') {
                    throw new InvalidArgumentException('Le titre ne peut pas être vide.');
                }

                return sprintf('Article publie : %s', $titre);
            }

            foreach (['Les exceptions en PHP', '   '] as $titre) {
                try {
                    echo publierArticle($titre) . PHP_EOL;
                } catch (InvalidArgumentException $exception) {
                    echo 'Publication refusee : ' . $exception->getMessage() . PHP_EOL;
                }
            }