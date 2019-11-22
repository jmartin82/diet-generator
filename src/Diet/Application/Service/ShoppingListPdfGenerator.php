<?php

declare(strict_types=1);

namespace App\Diet\Application\Service;

use Knp\Snappy\Pdf;
use Twig\Environment;

class ShoppingListPdfGenerator
{
    public const DIRECTORY_PATH = 'var/file/pdf/shopping_list/';

    private $pdf;

    private $twig;

    public function __construct(Pdf $pdf, Environment $twig)
    {
        $this->pdf = $pdf;
        $this->twig = $twig;
    }

    public function generate(array $products, string $startDate, string $endDate): void
    {
        $fileName = 'shopping_list_' . $startDate . '_' . $endDate . '.pdf';
        $html = $this->twig->render(
            'shopping-list-pdf.html.twig',
            [
                'products' => $products,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]
        );

        $this->pdf->generateFromHtml(
            $html,
            self::DIRECTORY_PATH . $fileName,
            [
                'margin-top' => 12,
                'margin-bottom' => 12,
                'margin-right' => 10,
                'margin-left' => 10
            ]
        );
    }
}
