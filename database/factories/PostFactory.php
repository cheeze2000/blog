<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = "Happy New Year 2023";
        $content = "
# Happy New Year 2023
One of my New Year's resolutions in 2023 is to maintain a blog. This post will be the one that starts it all.

I don't know what else to write for an introductory post, so I'll be testing stuff to see if my markdown rendering works.

## Crude Testing Ahead
This is **bolded**.

This is *italicised*.

This is [a link](#).

This is `inline code`.

This is _underlined_.

This is a placeholder image along with a caption.

![Placeholder Image](https://via.placeholder.com/150)
_**Figure 1:** A placeholder image_

```php
echo 'This is a code block.';
```

# Almost forgot about the headings
## and this one
### and this one

Please look forward to more exciting posts in the future!
        ";

        return [
            'title' => $title,
            'description' => 'An introductory post to start 2023 right',
            'slug' => Str::of($title)->slug(),
            'thumbnail' => 'https://i.postimg.cc/6qb1grnX/y2023.webp',
            'content' => $content,
            'read_time' => ceil(strlen($content) / 500),
            'published' => true,
            'pinned' => true,
        ];
    }
}
