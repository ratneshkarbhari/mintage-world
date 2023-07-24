<?php
 
namespace App\View\Components;
 
use Illuminate\View\Component;
use Illuminate\View\View;
 
class CoinInfoBreadCrumbs extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public string $breadCrumbsData,
    ) {}
 
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.coin-info-bread-crumb');
    }
}