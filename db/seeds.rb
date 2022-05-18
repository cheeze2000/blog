# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the bin/rails db:seed command (or created alongside the database with db:setup).
#
# Examples:
#
#   movies = Movie.create([{ name: "Star Wars" }, { name: "Lord of the Rings" }])
#   Character.create(name: "Luke", movie: movies.first)
(1..5).each do |n|
  Post.create(
    title: "Post #{n}",
    slug: "post-#{n}",
    description: "This is the description for Post #{n}.",
    content: "# Post #{n}\n### Post #{n}",
    published: true,
    pinned: false
  )
end

Post.create(
  title: "Spaghetti",
  slug: "spaghet",
  description: "How to cook spaghetti",
  content: "# How to cook spaghetti?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

## Boiling the water
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

## Cooking the spaghetti
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

## Test
this is **bolded** text. this is *italian*. this is [a link](https://google.com). this is `inline code` yea.

this is **bolded** text. this is *italian*. this is [a link](https://google.com). this is `inline code` yea.

this is **bolded** text. this is *italian*. this is [a link](https://google.com). this is `inline code` yea.

this is **bolded** text. this is *italian*. this is [a link](https://google.com). this is `not_inline_code` yea.

![placeholder image](http://via.placeholder.com/150)
_**Figure 1:** placeholder image example_

my to-do list lol:

- eat
- shit
- smile

my to-do list 2:

1. idk
2. idk

```js
// yeah
console.log(0);
```

nooo")
