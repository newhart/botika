<?php

namespace App\Livewire;

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
use Filament\Notifications\Notification;
use Livewire\Component;
use Illuminate\Support\Str;

class Post extends Component implements HasForms
{

    use InteractsWithForms;
    public Product $product;
    public ?array $data = [];
    public function mount(): void
    {
        $this->form->fill();
    }

    public function submit()
    {
        $data = $this->form->getState();
        $data['page_title'] = Str::slug($data['page_title']);
        $data['tags'] = implode(',', $data['tags']);
        $product =  Product::create($data);
        $this->form->model($product)->saveRelationships();
        // Notification::make()
        //     ->title('Saved successfully')
        //     ->success()
        //     ->send();
        return redirect()->route('products.index')->with('success', 'Product created with success');
    }

    public function render()
    {
        return view('livewire.post');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Information de la produit')
                    ->schema([
                        TextInput::make('name')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->required(),
                        Select::make('type')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->options([
                                'simple' => 'Simple',
                                'classified' => 'Classified',
                            ])->required(),
                        Select::make('categories')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->multiple()
                            ->relationship('categories',  'name')
                            ->required(),
                        Select::make('brand')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->options([
                                'puma' => 'Puma',
                                'zara' => 'Zara',
                                'hrx' => 'HRX',
                                'roadster' => 'Roadster',
                            ]),
                        Select::make('unit')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->options([
                                'piece' => 'Piece',
                                'kilogram' => 'Kilogram',
                            ]),
                        TagsInput::make('tags')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ]),
                        TextInput::make('stock')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->numeric()
                            ->required()
                    ]),
                Section::make('Description')
                    ->schema([
                        RichEditor::make('description')->extraInputAttributes([
                            'style' => 'border : 2px solid #dede ; color : #0000',
                        ])
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ]),
                    ]),
                Section::make('Product Image')
                    ->schema([
                        Repeater::make('images')
                            ->relationship()
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->imageEditor()
                                    ->extraInputAttributes([
                                        'style' => 'border : 2px solid #dede ; color : #0000',
                                    ])
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
                                    ])
                                    ->required()
                                    ->extraInputAttributes([
                                        'style' => 'border : 2px solid #dede ; color : #0000',
                                    ]),
                                TextInput::make('value')
                                    ->extraInputAttributes([
                                        'style' => 'border : 2px solid #dede ; color : #0000',
                                    ])
                            ])
                    ]),
                Section::make('Shipping')
                    ->schema([
                        TextInput::make('weight')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->numeric()
                            ->required(),
                        Select::make('dimensions')
                            ->options([
                                'length' => 'Length',
                                'width' => 'Width',
                                'height' => 'Height',
                            ])
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ]),
                    ]),
                Section::make('Product Price')
                    ->schema([
                        TextInput::make('price')
                            ->numeric()
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->required(),
                        TextInput::make('compare_at_price')
                            ->numeric()
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->required(),
                        TextInput::make('cos_per_item')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->numeric()
                            ->required()
                    ]),
                Section::make('Product Inventory')
                    ->schema([
                        TextInput::make('sku')
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ])
                            ->required()
                            ->unique(),
                        Select::make('status')
                            ->options([
                                'in sotck' => 'In stock',
                                'out of stock' => 'Out of Stock',
                                'on backorder' => 'On Backorder',
                            ])
                            ->extraInputAttributes([
                                'style' => 'border : 2px solid #dede ; color : #0000',
                            ]),
                    ]),
                Section::make('Search engine listing')
                    ->schema([
                        TextInput::make('page_title')->extraInputAttributes([
                            'style' => 'border : 2px solid #dede ; color : #0000',
                        ]),
                        Textarea::make('meta_description')->extraInputAttributes([
                            'style' => 'border : 2px solid #dede ; color : #0000',
                        ]),
                    ])
            ])
            ->statePath('data')
            ->model(Product::class);
    }

    public function getFormModel(): \Illuminate\Database\Eloquent\Model|string|null
    {
        return Product::class;
    }
}
