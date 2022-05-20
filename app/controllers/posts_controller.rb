class PostsController < ApplicationController
  def index
    @posts = Post.select(:id, :title, :slug)
                 .where(published: true)
                 .order(pinned: :desc, created_at: :desc)
                 .page(params[:page])
  end

  def show
    @post = Post.find_by(slug: params[:slug])
    redirect_to root_path unless @post
  end
end
