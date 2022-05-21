Rails.application.routes.draw do
  root "posts#index"

  get "/dashboard", to: "posts#dashboard"
  get "/posts", to: "posts#index"
  post "/posts", to: "posts#create"
  get "/posts/new", to: "posts#new", as: "new_post"
  get "/posts/:slug", to: "posts#show", as: "post"
  patch "/posts/:id", to: "posts#update"
  delete "/posts/:id", to: "posts#destroy"
  get "/posts/:id/edit", to: "posts#edit", as: "edit_post"
  get "/posts/:id/preview", to: "posts#preview", as: "preview_post"
  get "*path", to: redirect("/")
end
