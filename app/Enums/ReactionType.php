<?php

namespace App\Enums;

enum ReactionType: int
{
    case Love = 1;
    case Like = 2;
    case Funny = 3;
    case Sad = 4;
    case Boring = 5;
    case Angry = 6;

    public function label()
    {
        return match($this) {
            ReactionType::Love => "Kocham",
            ReactionType::Like => "Fajne",
            ReactionType::Funny => "Ha ha ha",
            ReactionType::Sad => "Smutne",
            ReactionType::Boring => "Nudne",
            ReactionType::Angry => "Słabe"
        };
    }

    public function svg()
    {
        return match($this) {
            ReactionType::Love => "reaction-love.svg",
            ReactionType::Like => "reaction-like.svg",
            ReactionType::Funny => "reaction-funny.svg",
            ReactionType::Sad => "reaction-sad.svg",
            ReactionType::Boring => "reaction-boring.svg",
            ReactionType::Angry => "reaction-angry.svg"
        };
    }

}
