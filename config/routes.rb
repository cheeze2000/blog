Rails.application.routes.draw do
  root "posts#index"

  get "/posts", to: "posts#index"
  get "/posts/:slug", to: "posts#show", as: "post"
  get "*path", to: redirect("/")
end
