<?php

namespace App\Dtos;

use App\Models\Product\CartItem;

class CartItemDto
{
    /**
     * Construtor da classe CartItemDto.
     * @param string $id ID do item do carrinho
     * @param string $cart_id ID do carrinho
     * @param string $prod_id ID do produto
     * @param string $name Nome do produto
     * @param string $image URL da imagem do produto
     * @param int $qty Quantidade do produto no carrinho
     * @param float $price Preço unitário do produto
     * @param float $subtotal Subtotal (qty * price)
     */
    public function __construct(
        public string $id,
        public string $cart_id,
        public string $prod_id,
        public string $name,
        public string $image,
        public int $qty,
        public float $price,
        public float $subtotal,
    ) {

        if ($this->qty <= 0) {
            throw new \InvalidArgumentException('A quantidade não pode ser negativa.');
        }
        if ($this->price < 0) {
            throw new \InvalidArgumentException('O preço não pode ser negativo.');
        }
    }

    /**
     * Cria um DTO a partir de uma instância do modelo CartItem.
     * @param CartItem $item
     * @return CartItemDto
     */
    public static function fromModel(CartItem $item): self
    {
        $subtotal = $item->qty * $item->price;

        return new self(
            id: $item->cart_item_id ?? $item->id, 
            cart_id: $item->cart_id,
            prod_id: $item->prod_id,
            name: $item->name,
            image: $item->image,
            qty: $item->qty,
            price: $item->price,
            subtotal: $subtotal // Use o subtotal calculado ou o do modelo, se confiável
        );
    }

    /**
     * Converte este DTO em uma nova instância do modelo CartItem.
     * ATENÇÃO: Isso cria um novo objeto CartItem, não o salva no banco.
     * @param CartItemDto $itemDto
     * @return CartItem
     */
    public static function toModel(CartItemDto $itemDto): CartItem
    {
        // Recalcula o subtotal para garantir que o modelo tenha o valor correto
        $subtotalCalculado = $itemDto->qty * $itemDto->price;

        return new CartItem([
            'cart_item_id' => $itemDto->id,
            'cart_id' => $itemDto->cart_id,
            'prod_id' => $itemDto->prod_id,
            'name' => $itemDto->name,
            'image' => $itemDto->image,
            'qty' => $itemDto->qty,
            'price' => $itemDto->price,
            'subtotal' => $subtotalCalculado, 
        ]);
    }
}