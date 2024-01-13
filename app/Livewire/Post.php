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
        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
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
                Section::make('Product Information haritiana')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        Select::make('type')
                            ->options([
                                'simple' => 'Simple',
                                'classified' => 'Classified',
                            ]),
                        Select::make('categories')
                            ->multiple()
                            ->relationship('categories',  'name'),
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
                            ->required()
                            ->unique(),
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
            ->model(Product::class);
    }

    public function saveOrUpdate()
    {
        dd('ok');
    }

    public function getFormModel(): \Illuminate\Database\Eloquent\Model|string|null
    {
        return Product::class;
    }
}
