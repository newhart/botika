<?php

namespace App\Livewire\Products;

use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class EditProduct extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public Product $record;

    public function mount($id): void
    {
        $product = Product::where('id', (int) $id)
            ->with(['images', 'categories', 'variants'])
            ->first();
        $product->tags = explode(',', $product->tags);
        $this->record = $product;
        $this->form->fill($this->record->attributesToArray());
    }



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Product Information')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        Select::make('type')
                            ->options([
                                'simple' => 'Simple',
                                'classified' => 'Classified',
                            ]),
                        Select::make('categories')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->multiple()
                            ->options(Category::all()->pluck('name', 'id'))
                            ->required(),
                        Select::make('brand')
                            ->options([
                                'puma' => 'Puma',
                                'zara' => 'Zara',
                                'hrx' => 'HRX',
                                'roadster' => 'Roadster',
                            ]),
                        Select::make('unit')
                            ->options([
                                'piece' => 'Piece',
                                'kilogram' => 'Kilogram',
                            ]),
                        TagsInput::make('tags'),
                        TextInput::make('stock')
                            ->numeric()
                            ->required()
                    ]),
                Section::make('Description')
                    ->schema([
                        RichEditor::make('description'),
                    ]),
                Section::make('Product Image')
                    ->schema([
                        Repeater::make('images')
                            ->relationship()
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->imageEditor()
                                    ->required(),
                            ])
                    ]),
                Section::make('Product variations')
                    ->schema([
                        Repeater::make('variants')
                            ->relationship()
                            ->schema([
                                Select::make('name')
                                    ->options([
                                        'color' => 'Color',
                                        'size' => 'Size',
                                        'material' => 'Material',
                                        'style' => 'Style',
                                    ]),
                                TextInput::make('value')
                            ])
                    ]),
                Section::make('Shipping')
                    ->schema([
                        TextInput::make('weight')
                            ->numeric(),
                        Select::make('dimensions')
                            ->options([
                                'length' => 'Length',
                                'width' => 'Width',
                                'height' => 'Height',
                            ]),
                    ]),
                Section::make('Product Price')
                    ->schema([
                        TextInput::make('price')
                            ->numeric()
                            ->required(),
                        TextInput::make('compare_at_price')
                            ->numeric()
                            ->required(),
                        TextInput::make('cos_per_item')
                            ->numeric()
                            ->required()
                    ]),
                Section::make('Product Inventory')
                    ->schema([
                        TextInput::make('sku')
                            ->required(),
                        Select::make('status')
                            ->options([
                                'in sotck' => 'In stock',
                                'out of stock' => 'Out of Stock',
                                'on backorder' => 'On Backorder',
                            ]),
                    ]),
                Section::make('Search engine listing')
                    ->schema([
                        TextInput::make('page_title'),
                        Textarea::make('meta_description'),
                    ])
            ])
            ->statePath('data')
            ->model($this->record);
    }

    public function edit(): void
    {
        $data = $this->form->getState();
        $this->record->update($data);
        $this->form->model($this->record)->saveRelationships();
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $categories =  $data['categories'];
        $data['page_title'] = Str::slug($data['page_title']);
        $data['tags'] = implode(',', $data['tags']);
        unset($data['categories']);
        $this->record->update($data);
        $this->record->categories()->detach($categories);
        $this->record->categories()->attach($categories);
        $this->form->model($this->record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.products.edit-product');
    }
}
