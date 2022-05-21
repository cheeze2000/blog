class PostsController < ApplicationController
  http_basic_authenticate_with name: ENV.fetch("ADMIN_USER"), password: ENV.fetch("ADMIN_PASSWORD"), except: [:index, :show]

  def index
    @posts = Post.published
                 .sorted
                 .select(:id, :title, :slug, :content, :pinned)
                 .page(params[:page]).without_count
  end

  def show
    @post = Post.published
                .select(:title, :slug, :description, :content)
                .find_by(slug: params[:slug])

    redirect_to root_path unless @post
  end

  def new
    @post = Post.new
  end

  def create
    @post = Post.new(post_params)
    redirect_to edit_post_path(@post.id) if @post.save
  end

  def edit
    @post = Post.find(params[:id])
  end

  def update
    @post = Post.find(params[:id])
    redirect_to preview_post_path if @post.update(post_params)
  end

  def destroy
    @post = Post.find(params[:id])
    @post.destroy

    redirect_to dashboard_path, status: :see_other
  end

  def dashboard
    @posts = Post.sorted.select(:id, :title, :published, :pinned)
  end

  def preview
    @post = Post.find(params[:id])
    redirect_to root_path unless @post
  end

  private
    def post_params
      params.require(:post).permit(:title, :slug, :description, :content, :published, :pinned)
    end
end
