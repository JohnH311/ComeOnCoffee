args <- commandArgs(TRUE)
N <- args[1]
x <- rnorm(N,0,1)
print(x)
png(filename = "temp.png", width=500, height=500)
hist(x, col = "lightblue")
write.table(x,file="temp4.txt")